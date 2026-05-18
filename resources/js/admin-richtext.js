import Quill from 'quill';
import 'quill/dist/quill.snow.css';

const EDITOR_SELECTOR = '[data-rich-text]';
const ERROR_CLASS = 'admin-field-error';

const toolbarOptions = [
    [{ header: [2, 3, false] }],
    ['bold', 'italic', 'underline', 'strike'],
    [{ color: [] }, { background: [] }],
    [{ list: 'ordered' }, { list: 'bullet' }],
    [{ indent: '-1' }, { indent: '+1' }],
    [{ align: [] }],
    ['blockquote', 'code-block'],
    ['link'],
    ['clean'],
];

function isEditorEmpty(quill) {
    return quill.getText().trim().length === 0;
}

function getErrorElement(textarea, wrapper) {
    const errorId = `${textarea.id}-client-error`;
    let error = document.getElementById(errorId);

    if (!error) {
        error = document.createElement('p');
        error.id = errorId;
        error.className = ERROR_CLASS;
        error.setAttribute('aria-live', 'polite');
        wrapper.insertAdjacentElement('afterend', error);
    }

    return error;
}

function showError(textarea, wrapper) {
    const error = getErrorElement(textarea, wrapper);

    error.textContent = `${textarea.dataset.label || 'Description'} is required.`;
    error.hidden = false;
    wrapper.classList.add('is-invalid');
    textarea.setAttribute('aria-invalid', 'true');
    textarea.setAttribute('aria-describedby', error.id);
}

function clearError(textarea, wrapper) {
    const error = document.getElementById(`${textarea.id}-client-error`);

    if (error) {
        error.textContent = '';
        error.hidden = true;
    }

    wrapper.classList.remove('is-invalid');
    textarea.removeAttribute('aria-invalid');
    textarea.removeAttribute('aria-describedby');
}

function syncTextarea(textarea, quill) {
    textarea.value = isEditorEmpty(quill) ? '' : quill.root.innerHTML;
}

function initRichText() {
    if (!document.body.matches('[data-admin-validation]')) {
        return;
    }

    document.querySelectorAll(EDITOR_SELECTOR).forEach((textarea) => {
        if (textarea.dataset.richTextReady === 'true') {
            return;
        }

        textarea.dataset.richTextReady = 'true';
        textarea.dataset.richTextInput = 'true';
        textarea.dataset.richTextRequired = textarea.required ? 'true' : 'false';
        textarea.required = false;
        textarea.hidden = true;

        const wrapper = document.createElement('div');
        wrapper.className = 'admin-rich-text mt-2';
        wrapper.innerHTML = '<div class="admin-rich-text-editor"></div>';
        textarea.insertAdjacentElement('afterend', wrapper);

        const editor = wrapper.querySelector('.admin-rich-text-editor');
        const quill = new Quill(editor, {
            modules: {
                toolbar: toolbarOptions,
            },
            placeholder: textarea.getAttribute('placeholder') || '',
            theme: 'snow',
        });

        quill.root.innerHTML = textarea.value || '';

        quill.on('text-change', () => {
            syncTextarea(textarea, quill);

            if (!isEditorEmpty(quill)) {
                clearError(textarea, wrapper);
            }
        });

        textarea.form?.addEventListener('submit', (event) => {
            syncTextarea(textarea, quill);

            if (textarea.dataset.richTextRequired === 'true' && isEditorEmpty(quill)) {
                event.preventDefault();
                event.stopPropagation();
                showError(textarea, wrapper);
                quill.focus();
                wrapper.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }, true);
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initRichText);
} else {
    initRichText();
}
