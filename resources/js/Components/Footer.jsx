

import { Link, usePage } from "@inertiajs/react"
import {
    Facebook,
    Instagram,
    Linkedin,
    Twitter,
    Youtube,
    Phone,
    Mail,
    MapPin
} from "lucide-react"

export default function Footer() {

    const { footer, siteSettings, contact, menus } = usePage().props

    /*
    |--------------------------------------------------------------------------
    | Social Icons
    |--------------------------------------------------------------------------
    */

    const socialIcons = {
        facebook: Facebook,
        instagram: Instagram,
        linkedin: Linkedin,
        twitter: Twitter,
        youtube: Youtube
    }

    /*
    |--------------------------------------------------------------------------
    | Navigation (same as header)
    |--------------------------------------------------------------------------
    */

    const defaultMenus = [
        { id: "services", title: "სერვისები", section: "services" },
        { id: "products", title: "პროდუქტები", section: "products" },
        { id: "projects", title: "პროექტები", section: "projects" },
        { id: "contact", title: "კონტაქტი", section: "contact" },
    ]

    const navigation = menus?.length ? menus : defaultMenus

    const resolveHref = (menu) => {

        if (menu.route) {
            return menu.route.startsWith("/")
                ? menu.route
                : `/${menu.route}`
        }

        return `#${menu.section}`
    }

    return (

        <footer
            style={{
                backgroundColor: footer?.footer_bg_color || "#0f172a",
                color: footer?.footer_text_color
            }}
            className="pt-20 pb-10"
        >

            <div className="max-w-7xl mx-auto px-6">

                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

                    {/* LOGO + ABOUT */}

                    <div className="space-y-6">

                        {/* LOGO + SITE NAME */}

                        <div className="flex items-center gap-3">

                            {siteSettings?.logo_url && (

                                <img
                                    src={siteSettings.logo_url}
                                    alt={siteSettings?.site_name}
                                    style={{
                                        height: footer?.footer_logo_size
                                    }}
                                    className="object-contain"
                                />

                            )}

                            {siteSettings?.site_name && (

                                <span
                                    style={{
                                        color: footer?.footer_logo_text_color,
                                        fontSize: footer?.footer_logo_text_size,
                                        fontWeight: footer?.footer_logo_text_weight
                                    }}
                                    className="tracking-wide"
                                >
                {siteSettings.site_name}
            </span>

                            )}

                        </div>

                        {/* DESCRIPTION */}

                        <p
                            style={{
                                fontSize: footer?.footer_text_size,
                                color: footer?.footer_description_color
                            }}
                            className="leading-relaxed opacity-80 max-w-sm"
                        >
                            {footer?.footer_description}
                        </p>

                    </div>

                    {/* CONTACT */}

                    <div>

                        <h4
                            style={{ fontSize: footer?.footer_title_size }}
                            className="font-semibold mb-6"
                        >
                            {footer?.footer_contact_title}
                        </h4>

                        <div
                            className="text-sm"
                            style={{
                                display: "flex",
                                flexDirection: "column",
                                gap: footer?.footer_contact_styles?.item_spacing || 16
                            }}
                        >

                            {footer?.contact_items?.map((item, index) => {

                                let Icon

                                if (item.type === "phone") Icon = Phone
                                if (item.type === "email") Icon = Mail
                                if (item.type === "address") Icon = MapPin

                                return (

                                    <div
                                        key={index}
                                        className="flex items-start"
                                        style={{
                                            gap: footer?.footer_contact_styles?.gap || 12,
                                            opacity: footer?.footer_contact_styles?.opacity || 0.8
                                        }}
                                    >

                                        {Icon && (

                                            <Icon
                                                style={{
                                                    width: footer?.footer_contact_styles?.icon_size || 16,
                                                    height: footer?.footer_contact_styles?.icon_size || 16,
                                                    color: footer?.footer_contact_styles?.icon_color,
                                                    background: footer?.footer_contact_styles?.icon_background,
                                                    borderRadius: footer?.footer_contact_styles?.icon_border_radius
                                                }}
                                                className="mt-[2px] flex-shrink-0"
                                            />

                                        )}

                                        <span
                                            style={{
                                                color: footer?.footer_contact_styles?.text_color,
                                                fontSize: footer?.footer_contact_styles?.text_size
                                            }}
                                        >
                        {item.value}
                    </span>

                                    </div>

                                )

                            })}

                        </div>

                    </div>

                    {/* NAVIGATION */}

                    <div>

                        <h4
                            style={{ fontSize: footer?.footer_title_size }}
                            className="font-semibold mb-6"
                        >
                            {footer?.footer_navigation_title}
                        </h4>

                        <ul className="space-y-3 text-sm">

                            {navigation.map(menu => {

                                const href = resolveHref(menu)

                                if (menu.route) {
                                    return (
                                        <li key={menu.id}>
                                            <Link
                                                href={href}
                                                className="hover:text-white transition"
                                            >
                                                {menu.title}
                                            </Link>
                                        </li>
                                    )
                                }

                                return (
                                    <li key={menu.id}>
                                        <a
                                            href={href}
                                            className="hover:text-white transition"
                                        >
                                            {menu.title}
                                        </a>
                                    </li>
                                )

                            })}

                        </ul>

                    </div>


                    {/* SOCIAL */}

                    <div>

                        <h4
                            style={{ fontSize: footer?.footer_title_size }}
                            className="font-semibold mb-6"
                        >
                            {footer?.footer_social_title}
                        </h4>

                        <p
                            style={{
                                color: footer?.footer_follow_color,
                                fontSize: footer?.footer_follow_size,
                                opacity: footer?.footer_follow_opacity,
                                fontWeight: footer?.footer_follow_weight
                            }}
                            className="mb-6"
                        >
                            {footer?.footer_follow_text}
                        </p>

                        <div className="flex gap-4">

                            {footer?.footer_social_links?.map((social, index) => {

                                const Icon = socialIcons[social.platform]

                                if (!Icon) return null

                                return (

                                    <a
                                        key={index}
                                        href={social.url}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        style={{
                                            backgroundColor: footer?.footer_social_bg,
                                            color: footer?.footer_social_color
                                        }}
                                        onMouseEnter={(e) => {
                                            e.currentTarget.style.backgroundColor = footer?.footer_social_hover_bg
                                            e.currentTarget.style.color = footer?.footer_social_hover_color
                                        }}
                                        onMouseLeave={(e) => {
                                            e.currentTarget.style.backgroundColor = footer?.footer_social_bg
                                            e.currentTarget.style.color = footer?.footer_social_color
                                        }}
                                        className="
                                            flex
                                            items-center
                                            justify-center
                                            w-10
                                            h-10
                                            rounded-lg
                                            transition
                                        "
                                    >

                                        <Icon className="w-5 h-5" />

                                    </a>

                                )

                            })}

                        </div>

                    </div>

                </div>


                {/* COPYRIGHT BAR */}

                <div
                    className="
                        border-t
                        border-white/10
                        mt-16
                        pt-8
                        text-center
                        text-sm
                        opacity-80
                    "
                >

                    {footer?.footer_copyright
                        ? footer.footer_copyright
                        : `© ${new Date().getFullYear()} ${siteSettings?.site_name}. ყველა უფლება დაცულია.`}

                </div>

            </div>

        </footer>

    )

}
