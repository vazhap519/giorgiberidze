import { Link } from "@inertiajs/react";

export default function Header({ siteSettings }) {

    const logo = siteSettings?.logo_url
    return (
        <header className="w-full shadow-md">

            <div className="bg-gradient-to-r from-blue-700 to-blue-500 text-white">

                <div className="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

                    {/* LOGO */}
                    <Link href="/" className="flex items-center gap-3">

                        {logo && (
                            <img
                                src={logo}
                                alt={siteSettings?.site_name}
                                className="h-10"
                            />
                        )}

                    </Link>

                    {/* NAVIGATION */}
                    {/*<nav className="flex items-center gap-8 font-medium">*/}

                    {/*    <Link*/}
                    {/*        href="#"*/}
                    {/*        className="hover:text-blue-200 transition"*/}
                    {/*    >*/}
                    {/*        Products*/}
                    {/*    </Link>*/}

                    {/*    <Link*/}
                    {/*        href="#"*/}
                    {/*        className="hover:text-blue-200 transition"*/}
                    {/*    >*/}
                    {/*        Software*/}
                    {/*    </Link>*/}

                    {/*    <Link*/}
                    {/*        href="#"*/}
                    {/*        className="hover:text-blue-200 transition"*/}
                    {/*    >*/}
                    {/*        Technologies*/}
                    {/*    </Link>*/}

                    {/*</nav>*/}
                    <nav className="flex items-center gap-8 font-medium">

                        <a
                            href="#products"
                            className="hover:text-blue-200 transition"
                        >
                            პროდუქტები
                        </a>

                        <a
                            href="#services"
                            className="hover:text-blue-200 transition"
                        >
                            სერვისები
                        </a>

                        <a
                            href="#contact"
                            className="hover:text-blue-200 transition"
                        >
                            კონტაქტი
                        </a>

                    </nav>
                </div>

            </div>

        </header>
    );
}
