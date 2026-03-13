
import React, { useState } from "react"
import { usePage, Link } from "@inertiajs/react"
import MainLayout from "@/Layouts/MainLayout"

import HeroCarousel from "@/Components/HeroCarousel.jsx"
import ProductCard from "@/Components/ProductCard.jsx"
import SectionTitle from "@/Components/SectionTitle"
import ServiceCard from "@/Components/ServiceCard.jsx"
import ProjectCard from "@/Components/ProjectCard.jsx"
import AboutUs from "@/Components/AboutUs.jsx"
import Contact from "@/Components/Contact.jsx"
import Partners from "@/Components/Partners.jsx"

export default function Home() {

    const { slides, products, siteSettings, services, projects, about, contact, partners } = usePage().props

    const [visibleServicesCount, setVisibleServicesCount] = useState(3)

    const loadMoreServices = () => setVisibleServicesCount(prev => prev + 3)

    const visibleServices = services.slice(0, visibleServicesCount)


    /* -------------------------
       Dynamic Styles
    ------------------------- */

    const sectionStyle = {
        background: siteSettings?.site_section_bg || undefined,
        paddingTop: siteSettings?.site_section_padding
            ? `${siteSettings.site_section_padding}px`
            : undefined,
        paddingBottom: siteSettings?.site_section_padding
            ? `${siteSettings.site_section_padding}px`
            : undefined,
        position: siteSettings?.site_section_position || undefined
    }

    const containerStyle = {
        maxWidth: siteSettings?.site_container_width
            ? `${siteSettings.site_container_width}px`
            : undefined
    }


    return (

        <MainLayout fullWidth>

            <div className="bg-white overflow-hidden">

                <HeroCarousel slides={slides} />



                {/* SERVICES */}

                {services.length > 0 && (

                    <section
                        id="services"
                        className="relative py-28 bg-gradient-to-b from-white to-slate-50"
                        style={sectionStyle}
                    >

                        <div
                            className="max-w-7xl mx-auto px-6"
                            style={containerStyle}
                        >

                            <SectionTitle title={siteSettings?.services_header} />

                            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mt-16">

                                {visibleServices.map((service) => (

                                    <ServiceCard
                                        key={service.id}
                                        service={service}
                                    />

                                ))}

                            </div>

                            {visibleServicesCount < services.length && (

                                <div className="flex justify-center mt-16">

                                    <button
                                        onClick={loadMoreServices}
                                        className="
px-8 py-3
rounded-xl
bg-blue-600
text-white
font-semibold
shadow-lg
hover:bg-blue-700
hover:scale-[1.03]
transition
"
                                    >
                                        მეტი სერვისი
                                    </button>

                                </div>

                            )}

                        </div>

                    </section>

                )}


                {/* PRODUCTS */}

                {products.length > 0 && (

                    <section
                        id="products"
                        className="relative py-28 bg-white"
                        style={sectionStyle}
                    >

                        <div
                            className="max-w-7xl mx-auto px-6"
                            style={containerStyle}
                        >

                            <Link href="/products">
                                <SectionTitle title={siteSettings?.products_title} />
                            </Link>

                            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 mt-16">

                                {products.map((product) => (

                                    <ProductCard
                                        key={product.id}
                                        product={product}
                                    />

                                ))}

                            </div>

                        </div>

                    </section>

                )}


                {/* PARTNERS */}

                <section
                    id="partners"
                    className="relative py-28 bg-white"
                    style={sectionStyle}
                >
                    <div
                        className="max-w-7xl mx-auto px-6"
                        style={containerStyle}
                    >
                    <SectionTitle title={siteSettings?.partner_title} />


                        <Partners partners={partners}/>
                    </div>

                </section>


                {/* PROJECTS */}

                {projects?.length > 0 && (

                    <section
                        id="projects"
                        className="relative py-28 bg-slate-50"
                        style={sectionStyle}
                    >

                        <div
                            className="max-w-7xl mx-auto px-6"
                            style={containerStyle}
                        >

                            <div className="flex items-center justify-between">

                                <Link
                                    href={route('projects')}
                                    className="text-sm font-medium text-blue-600"
                                >

                                    <SectionTitle title="შესრულებული პროექტები" />

                                </Link>

                            </div>

                            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 mt-16">

                                {projects.map((project) => (

                                    <ProjectCard
                                        key={project.id}
                                        project={project}
                                    />

                                ))}

                            </div>

                        </div>

                    </section>

                )}


                {/* ABOUT */}

                {about && (

                    <section
                        className="relative py-28 bg-white"
                        style={sectionStyle}
                    >

                        <div
                            className="max-w-7xl mx-auto px-6"
                            style={containerStyle}
                        >
                            <AboutUs about={about} />
                        </div>

                    </section>

                )}


                {/* CONTACT */}

                <section
                    id="contact"
                    className="relative py-28 bg-gradient-to-b from-slate-50 to-white"
                    style={sectionStyle}
                >

                    <div
                        className="max-w-7xl mx-auto px-6 mb-16"
                        style={containerStyle}
                    >

                        <SectionTitle title={contact?.contact_form_title ?? "დაგვიკავშირდით"} />

                    </div>

                    <Contact contact={contact} />

                </section>

            </div>

        </MainLayout>

    )

}
