import { Link, usePage } from "@inertiajs/react";
import { useState } from "react";

export default function Header({ siteSettings }) {

    const [open, setOpen] = useState(false);

    const { menus } = usePage().props;

    const logo = siteSettings?.logo_url;

    /*
    |--------------------------------------------------------------------------
    | Default Sections (თუ DB ცარიელია)
    |--------------------------------------------------------------------------
    */

    const defaultMenus = [
        { id: "services", title: "სერვისები", section: "services" },
        { id: "products", title: "პროდუქტები", section: "products" },
        { id: "projects", title: "პროექტები", section: "projects" },
        { id: "contact", title: "კონტაქტი", section: "contact" },
    ];

    const navigation = menus?.length ? menus : defaultMenus;

    /*
    |--------------------------------------------------------------------------
    | Navbar Settings (Filament)
    |--------------------------------------------------------------------------
    */

    const navbarSettings = menus?.length ? menus[0] : null;

    const headerStyle = {
        backgroundColor: navbarSettings?.nav_bg_color || "#d0d1d5",
        backdropFilter: `blur(${navbarSettings?.nav_blur || 20}px)`,
        opacity: navbarSettings?.nav_opacity ?? 0.6,
        zIndex: navbarSettings?.nav_z_index || 50,
    };

    const linkColor = navbarSettings?.nav_link_color || "#9ba4b1";
    const hoverColor = navbarSettings?.nav_hover_color || "#475569";

    /*
    |--------------------------------------------------------------------------
    | CTA Button
    |--------------------------------------------------------------------------
    */

    const ctaText = navbarSettings?.cta_text || "დაგვიკავშირდი";
    const ctaLink = navbarSettings?.cta_link || "#contact";
    const ctaBg = navbarSettings?.cta_bg_color || "#2563eb";
    const ctaTextColor = navbarSettings?.cta_text_color || "#ffffff";
    const ctaHover = navbarSettings?.cta_hover_color || "#1d4ed8";
    const ctaRadius = navbarSettings?.cta_radius || 12;

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    const resolveHref = (menu) => {
        if (menu.route) {
            return menu.route.startsWith("/")
                ? menu.route
                : `/${menu.route}`;
        }

        return `#${menu.section}`;
    };

    const handleHover = (e, color) => {
        e.currentTarget.style.color = color;
    };

    const handleBgHover = (e, color) => {
        e.currentTarget.style.backgroundColor = color;
    };
    const logoStyle = {
        width: `${siteSettings?.site_logo_width || 120}px`,
        height: `${siteSettings?.site_logo_height || 40}px`,
        objectFit: siteSettings?.site_logo_fit || "contain",
        borderRadius: `${siteSettings?.site_logo_radius || 0}px`
    }

    const siteNameStyle = {
        color: siteSettings?.site_header_text_color || "#1e293b",
        fontSize: `${siteSettings?.site_name_size || 18}px`,
        fontWeight: siteSettings?.site_name_weight || 600
    }
    return (

        <div className="fixed w-full" style={{ zIndex: headerStyle.zIndex }}>

            <header
                style={headerStyle}
                className="w-full border-b border-white/30"
            >

                <div className="max-w-7xl mx-auto flex items-center justify-between px-6 h-20">

                    {/* LOGO */}
                    <Link href="/" className="flex items-center gap-3">

                        {logo && (
                            <img
                                src={logo}
                                alt={siteSettings?.site_name}
                                style={logoStyle}
                                className="transition duration-300"
                            />
                        )}

                        <span
                            style={siteNameStyle}
                            className="hidden sm:block"
                        >
    {siteSettings?.site_name}
</span>

                    </Link>

                    {/* DESKTOP NAV */}
                    <nav className="hidden md:flex items-center gap-10 font-medium">

                        {navigation.map(menu => {

                            const href = resolveHref(menu);

                            const baseStyle = { color: linkColor };

                            if (menu.route) {
                                return (
                                    <Link
                                        key={menu.id}
                                        href={href}
                                        style={baseStyle}
                                        onMouseEnter={(e)=>handleHover(e, hoverColor)}
                                        onMouseLeave={(e)=>handleHover(e, linkColor)}
                                        className="transition"
                                    >
                                        {menu.title}
                                    </Link>
                                );
                            }

                            return (
                                <a
                                    key={menu.id}
                                    href={href}
                                    style={baseStyle}
                                    onMouseEnter={(e)=>handleHover(e, hoverColor)}
                                    onMouseLeave={(e)=>handleHover(e, linkColor)}
                                    className="transition"
                                >
                                    {menu.title}
                                </a>
                            );

                        })}

                    </nav>

                    {/* CTA */}
                    <div className="hidden md:flex items-center gap-4">

                        <a
                            href={ctaLink}
                            style={{
                                backgroundColor: ctaBg,
                                color: ctaTextColor,
                                borderRadius: `${ctaRadius}px`
                            }}
                            onMouseEnter={(e)=>handleBgHover(e, ctaHover)}
                            onMouseLeave={(e)=>handleBgHover(e, ctaBg)}
                            className="px-5 py-2.5 font-medium transition shadow"
                        >
                            {ctaText}
                        </a>

                    </div>

                    {/* MOBILE BUTTON */}
                    <button
                        onClick={() => setOpen(!open)}
                        className="md:hidden text-slate-700"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            className="h-7 w-7"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >

                            {open ? (
                                <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth={2}
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            ) : (
                                <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth={2}
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                            )}

                        </svg>

                    </button>

                </div>

                {/* MOBILE NAV */}
                {open && (

                    <div
                        className="md:hidden border-t border-white/30 backdrop-blur-lg"
                        style={{ backgroundColor: headerStyle.backgroundColor }}
                    >

                        <nav className="flex flex-col gap-4 px-6 py-6 font-medium">

                            {navigation.map(menu => {

                                const href = resolveHref(menu);

                                if (menu.route) {
                                    return (
                                        <Link
                                            key={menu.id}
                                            href={href}
                                            onClick={() => setOpen(false)}
                                            style={{ color: linkColor }}
                                        >
                                            {menu.title}
                                        </Link>
                                    );
                                }

                                return (
                                    <a
                                        key={menu.id}
                                        href={href}
                                        onClick={() => setOpen(false)}
                                        style={{ color: linkColor }}
                                    >
                                        {menu.title}
                                    </a>
                                );

                            })}

                            {/* MOBILE CTA */}
                            <a
                                href={ctaLink}
                                style={{
                                    backgroundColor: ctaBg,
                                    color: ctaTextColor,
                                    borderRadius: `${ctaRadius}px`
                                }}
                                onMouseEnter={(e)=>handleBgHover(e, ctaHover)}
                                onMouseLeave={(e)=>handleBgHover(e, ctaBg)}
                                className="mt-2 px-5 py-2.5 text-center font-medium transition shadow"
                            >
                                {ctaText}
                            </a>

                        </nav>

                    </div>

                )}

            </header>

        </div>
    );
}
