<?php

namespace App\Services\Frontend;

use App\Data\ServiceData;
use App\Models\Service;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ServicePageService
{
    public function all(): array
    {
        try {
            $services = Service::query()
                ->active()
                ->orderBy('sort_order')
                ->orderBy('title')
                ->get();

            if ($services->isNotEmpty()) {
                return $services->map(fn (Service $service) => $this->fromModel($service))->all();
            }
        } catch (\Throwable) {
            //
        }

        return $this->fallback();
    }

    private function fallback(): array
    {
        return [
            $this->make('Commercial Cleaning', 'Reliable scheduled cleaning for commercial premises, communal spaces and client-facing environments.', 'Professional commercial cleaning for offices, retail spaces, communal areas and managed properties. Crestwell builds practical cleaning routines that protect your workplace standards and brand presentation.', ['Consistent cleaning standards', 'Flexible daily, weekly or periodic schedules', 'Suitable for offices, retail and shared facilities', 'Clear communication and service checks'], 'service/service_box_1.png', 'fa-solid fa-building'),
            $this->make('Office Cleaning', 'Daily and periodic office cleaning for productive, presentable workplaces.', 'Office cleaning built around real working environments, from desks and meeting rooms to washrooms, kitchens, reception areas and high-touch surfaces.', ['Early morning, evening or out-of-hours options', 'Workstation, washroom and kitchen care', 'Supports staff wellbeing and visitor confidence', 'Recurring plans for growing teams'], 'service/service_box_2.png', 'fa-solid fa-broom'),
            $this->make('End of Tenancy Cleaning', 'Detailed handover cleaning for landlords, agents and tenants.', 'A thorough clean for rental property handovers, helping properties present professionally for inspections, new tenants and marketing.', ['Kitchen and bathroom detail cleaning', 'Agent and landlord friendly service', 'Improves presentation before viewings', 'One-off booking availability'], 'service/service_box_3.png', 'fa-solid fa-spray-can-sparkles'),
            $this->make('Airbnb / Serviced Accommodation Cleaning', 'Fast, reliable turnover cleaning for short-stay properties.', 'Guest-ready cleaning for Airbnb and serviced accommodation operators who need consistent standards, responsive scheduling and smooth changeovers.', ['Turnaround cleaning between stays', 'Linen and presentation support ready', 'Reliable standards for guest reviews', 'Scalable for multiple units'], 'service/service_box_1.png', 'fa-solid fa-house-chimney'),
            $this->make('Deep Cleaning', 'Intensive cleaning for neglected, high-use or priority spaces.', 'Deep cleaning for spaces needing more than routine maintenance, including detailed surface care, washrooms, kitchens, high-touch areas and hard-to-reach zones.', ['Ideal before launches, inspections or reopenings', 'Targets built-up dirt and high-use areas', 'Supports hygiene and presentation goals', 'Available for commercial and residential spaces'], 'service/service_box_2.png', 'fa-solid fa-soap'),
            $this->make('Facilities Support', 'Practical support services for managed buildings and operations.', 'Facilities support for businesses, landlords and property managers needing dependable cleaning-led operational assistance as their portfolio grows.', ['Scalable facilities service structure', 'Supports property managers and operators', 'Recurring and ad hoc support options', 'Professional reporting and communication'], 'service/service_box_3.png', 'fa-solid fa-briefcase'),
            $this->make('Pressure Washing', 'Exterior surface cleaning for entrances, paths and hardstanding areas.', 'Pressure washing for commercial frontages, paths, driveways, bin stores, courtyards and external surfaces that shape first impressions.', ['Improves kerb appeal', 'Suitable for commercial and residential exteriors', 'Removes surface grime and weathering', 'Supports periodic property maintenance'], 'service/service_box_1.png', 'fa-solid fa-hand-sparkles'),
            $this->make('Emergency Cleaning', 'Responsive cleaning for urgent incidents and short-notice needs.', 'Emergency cleaning support for spills, property issues, guest changeover pressure, event aftermath and urgent commercial presentation needs.', ['Short-notice response', 'Useful for incidents and urgent handovers', 'Commercial and property-focused support', 'Clear scope before attendance'], 'service/service_box_2.png', 'fa-solid fa-truck-fast'),
            $this->make('Property Management Cleaning', 'Cleaning support for landlords, agents and managed property portfolios.', 'Property management cleaning for communal areas, void properties, serviced accommodation, inspections and recurring maintenance routines.', ['Designed for portfolios and managed sites', 'Supports inspections and tenant experience', 'Recurring communal cleaning options', 'One-off and ongoing plans'], 'service/service_box_3.png', 'fa-solid fa-warehouse'),
        ];
    }

    public function featured(int $limit = 6): array
    {
        return array_slice($this->all(), 0, $limit);
    }

    public function findBySlug(string $slug): ServiceData
    {
        foreach ($this->all() as $service) {
            if ($service->slug === $slug) {
                return $service;
            }
        }

        throw new NotFoundHttpException();
    }

    private function make(string $title, string $excerpt, string $description, array $benefits, string $image, string $iconClass): ServiceData
    {
        $slug = Str::slug($title);

        return new ServiceData(
            $title,
            $slug,
            $excerpt,
            $description,
            $benefits,
            [
                ['question' => "Do you offer {$title} for commercial clients?", 'answer' => 'Yes. Crestwell is designed for commercial, property and facilities-led clients, with residential support available where appropriate.'],
                ['question' => 'Can I request a recurring schedule?', 'answer' => 'Yes. We can quote for one-off, daily, weekly, fortnightly or custom recurring arrangements.'],
                ['question' => 'How do I get a quote?', 'answer' => 'Use the quote form, call the team or send a WhatsApp enquiry with your property type, location and required service.'],
            ],
            $image,
            $iconClass,
            "{$title} | Crestwell Facilities",
            "{$title} by Crestwell Facilities. Premium cleaning and facilities support for commercial, property and residential spaces.",
        );
    }

    private function fromModel(Service $service): ServiceData
    {
        return new ServiceData(
            $service->title,
            $service->slug,
            $service->excerpt,
            $service->description,
            $service->benefits ?: [],
            $service->faqs ?: [],
            $service->image ?: 'service/service_box_1.png',
            $service->icon_class ?: 'fa-solid fa-broom',
            $service->meta_title ?: "{$service->title} | Crestwell Facilities",
            $service->meta_description ?: $service->excerpt,
        );
    }
}
