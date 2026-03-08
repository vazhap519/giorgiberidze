
import { Link } from "@inertiajs/react";
import { useState } from "react";

export default function Header({ siteSettings }) {

    const [open, setOpen] = useState(false);
    const logo = siteSettings?.logo_url;

    return (
        <header className="w-full sticky top-0 z-50 backdrop-blur bg-white/80 shadow-sm">

            <div className="max-w-7xl mx-auto flex items-center justify-between px-6 h-20">

                {/* LOGO */}
                <Link href="/" className="flex items-center gap-3">

                    {logo && (
                        <img
                            src={logo}
                            alt={siteSettings?.site_name}
                            className="h-10 w-auto"
                        />
                    )}

                    <span className="hidden sm:block font-semibold text-lg text-slate-800">
                        {siteSettings?.site_name}
                    </span>

                </Link>

                {/* DESKTOP NAV */}
                <nav className="hidden md:flex items-center gap-10 font-medium text-slate-700">

                    <a
                        href="#services"
                        className="hover:text-blue-600 transition"
                    >
                        სერვისები
                    </a>

                    <a
                        href="#products"
                        className="hover:text-blue-600 transition"
                    >
                        პროდუქტები
                    </a>

                    <a
                        href="#projects"
                        className="hover:text-blue-600 transition"
                    >
                        პროექტები
                    </a>

                    <a
                        href="#contact"
                        className="hover:text-blue-600 transition"
                    >
                        კონტაქტი
                    </a>

                </nav>

                {/* CTA BUTTON */}
                <div className="hidden md:flex items-center gap-4">

                    <a
                        href="#contact"
                        className="px-5 py-2.5 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700 transition shadow"
                    >
                        დაგვიკავშირდი
                    </a>

                </div>

                {/* MOBILE MENU BUTTON */}
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
                <div className="md:hidden border-t bg-white">

                    <nav className="flex flex-col gap-4 px-6 py-6 font-medium text-slate-700">

                        <a href="#services" onClick={() => setOpen(false)}>
                            სერვისები
                        </a>

                        <a href="#products" onClick={() => setOpen(false)}>
                            პროდუქტები
                        </a>

                        <a href="#projects" onClick={() => setOpen(false)}>
                            პროექტები
                        </a>

                        <a href="#contact" onClick={() => setOpen(false)}>
                            კონტაქტი
                        </a>

                        <a
                            href="#contact"
                            className="mt-2 px-5 py-2.5 rounded-xl bg-blue-600 text-white text-center"
                        >
                            დაგვიკავშირდი
                        </a>

                    </nav>

                </div>
            )}

        </header>
    );
}