const FIELD_SELECTOR = 'input, select, textarea';
const IGNORED_TYPES = new Set(['button', 'submit', 'reset', 'hidden']);

function isValidatableField(field) {
    return field.matches(FIELD_SELECTOR)
        && !field.disabled
        && !field.hidden
        && field.dataset.richTextInput !== 'true'
        && !IGNORED_TYPES.has(field.type);
}

function getFieldLabel(field) {
    const label = field.id
        ? document.querySelector(`label[for="${CSS.escape(field.id)}"]`)
        : field.closest('label');

    const text = label?.textContent?.trim().replace(/\s+/g, ' ');

    if (text) {
        return text;
    }

    return field.name
        ? field.name.replace(/\[\]/g, '').replace(/[_-]/g, ' ')
        : 'This field';
}

function formatMessage(field) {
    const validity = field.validity;
    const label = getFieldLabel(field);
    const labelText = label === 'This field' ? label : label.replace(/[.:]$/, '');

    if (validity.valueMissing) {
        return `${labelText} is required.`;
    }

    if (validity.typeMismatch) {
        if (field.type === 'email') {
            return 'Enter a valid email address.';
        }

        if (field.type === 'url') {
            return 'Enter a valid URL.';
        }

        return `Enter a valid ${labelText.toLowerCase()}.`;
    }

    if (validity.tooShort) {
        return `Use at least ${field.minLength} characters.`;
    }

    if (validity.tooLong) {
        return `Keep this to ${field.maxLength} characters or fewer.`;
    }

    if (validity.rangeUnderflow) {
        return `Use a value of ${field.min} or higher.`;
    }

    if (validity.rangeOverflow) {
        return `Use a value of ${field.max} or lower.`;
    }

    if (validity.stepMismatch) {
        return 'Enter a valid increment.';
    }

    if (validity.patternMismatch) {
        return field.title || `Enter a valid ${labelText.toLowerCase()}.`;
    }

    if (validity.badInput) {
        return `Enter a valid ${labelText.toLowerCase()}.`;
    }

    return field.validationMessage || 'Please check this field.';
}

function getErrorElement(field) {
    const errorId = field.id
        ? `${field.id}-client-error`
        : `field-client-error-${field.name?.replace(/[^a-z0-9_-]/gi, '-')}`;

    let error = errorId ? document.getElementById(errorId) : null;

    if (!error) {
        error = document.createElement('p');
        error.id = errorId;
        error.className = 'admin-field-error';
        error.setAttribute('aria-live', 'polite');

        const anchor = field.closest('label') || field;
        anchor.insertAdjacentElement('afterend', error);
    }

    return error;
}

function showError(field) {
    const error = getErrorElement(field);
    const describedBy = field.getAttribute('aria-describedby')?.split(/\s+/).filter(Boolean) || [];

    error.textContent = formatMessage(field);
    error.hidden = false;
    field.setAttribute('aria-invalid', 'true');

    if (!describedBy.includes(error.id)) {
        describedBy.push(error.id);
    }

    field.setAttribute('aria-describedby', describedBy.join(' '));
}

function clearError(field) {
    const error = field.id ? document.getElementById(`${field.id}-client-error`) : null;

    if (error) {
        error.textContent = '';
        error.hidden = true;
    }

    field.removeAttribute('aria-invalid');

    const describedBy = field.getAttribute('aria-describedby');
    if (describedBy && error) {
        const nextValue = describedBy
            .split(/\s+/)
            .filter((id) => id && id !== error.id)
            .join(' ');

        if (nextValue) {
            field.setAttribute('aria-describedby', nextValue);
        } else {
            field.removeAttribute('aria-describedby');
        }
    }
}

function validateField(field) {
    if (!isValidatableField(field)) {
        return true;
    }

    if (field.checkValidity()) {
        clearError(field);
        return true;
    }

    showError(field);
    return false;
}

function wireAdminValidation() {
    if (!document.body.matches('[data-admin-validation]')) {
        return;
    }

    const firstServerError = document.querySelector('.border-red-400');
    if (firstServerError) {
        window.requestAnimationFrame(() => {
            firstServerError.scrollIntoView({ behavior: 'smooth', block: 'center' });

            if (typeof firstServerError.focus === 'function') {
                firstServerError.focus({ preventScroll: true });
            }
        });
    }

    document.querySelectorAll('form').forEach((form) => {
        form.noValidate = true;

        form.addEventListener('submit', (event) => {
            const invalidFields = Array.from(form.elements)
                .filter(isValidatableField)
                .filter((field) => !validateField(field));

            if (invalidFields.length === 0) {
                return;
            }

            event.preventDefault();
            event.stopPropagation();

            invalidFields[0].focus({ preventScroll: true });
            invalidFields[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
        });

        form.addEventListener('input', (event) => {
            if (isValidatableField(event.target)) {
                validateField(event.target);
            }
        });

        form.addEventListener('change', (event) => {
            if (isValidatableField(event.target)) {
                validateField(event.target);
            }
        });
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', wireAdminValidation);
} else {
    wireAdminValidation();
}
