import React, { useState } from "react"
import { usePage } from "@inertiajs/react"
import SeoHead from "../Components/SeoHead.jsx"
import HeroCarousel from "@/Components/HeroCarousel.jsx"
import ProductCard from "@/Components/ProductCard.jsx"
import SectionTitle from "@/Components/SectionTitle"
import ServiceCard from "@/Components/ServiceCard.jsx"
import Contact from "@/Components/Contact.jsx";
import Header from "@/Components/Header.jsx";
import ProjectCard from "@/Components/ProjectCard.jsx";

export default function Home() {

    const { seo, slides, products, siteSettings, services,projects  } = usePage().props

    /* PRODUCTS STATE */
    const [visibleProductsCount, setVisibleProductsCount] = useState(3)

    /* SERVICES STATE */
    const [visibleServicesCount, setVisibleServicesCount] = useState(3)

    /* LOAD MORE FUNCTIONS */
    const loadMoreProducts = () => {
        setVisibleProductsCount((prev) => prev + 3)
    }

    const loadMoreServices = () => {
        setVisibleServicesCount((prev) => prev + 3)
    }

    /* VISIBLE DATA */
    const visibleProducts = products.slice(0, visibleProductsCount)
    const visibleServices = services.slice(0, visibleServicesCount)

    return (
        <div>

            <SeoHead seo={seo} pageTitle="Home" />
            {/*Header*/}
            <Header siteSettings={siteSettings} />
            {/*Hero*/}
            <HeroCarousel slides={slides} />
            {/* SERVICES */}
            {services.length > 0 && (
                <section  id="services" className="max-w-7xl mx-auto py-20 px-6">

                    <SectionTitle title={siteSettings?.services_header} />

                    <div className="
        grid
        grid-cols-1
        sm:grid-cols-2
        lg:grid-cols-3
        gap-10
        justify-items-center
        items-start
        mt-12
    ">

                        {visibleServices.map((service) => (
                            <div
                                key={service.id}
                                className="animate-fadeIn w-full flex justify-center"
                            >
                                <ServiceCard service={service} />
                            </div>
                        ))}

                    </div>

                    {visibleServicesCount < services.length && (

                        <div className="flex justify-center mt-12">

                            <button
                                onClick={loadMoreServices}
                                className="px-8 py-3 rounded-full bg-blue-600 text-white font-semibold hover:bg-blue-700 transition"
                            >
                                მეტი სერვისი
                            </button>

                        </div>

                    )}

                </section>
            )}
            {/* PRODUCTS */}
            {products.length > 0 && (
                <section id="products" className="max-w-7xl mx-auto py-20 px-6">

                    <SectionTitle title={siteSettings?.products_title} />

                    <div className="
        grid
        grid-cols-1
        sm:grid-cols-2
        lg:grid-cols-3
        xl:grid-cols-4
        gap-10
        justify-items-center
        mt-12
    ">

                        {visibleProducts.map((product) => (
                            <div
                                key={product.id}
                                className="animate-fadeIn w-full flex justify-center"
                            >
                                <ProductCard product={product} />
                            </div>
                        ))}

                    </div>

                    {visibleProductsCount < products.length && (

                        <div className="flex justify-center mt-12">

                            <button
                                onClick={loadMoreProducts}
                                className="px-8 py-3 rounded-full bg-blue-600 text-white font-semibold hover:bg-blue-700 transition"
                            >
                                სხვა პროდუქტები
                            </button>

                        </div>

                    )}

                </section>
            )}
            {/* PROJECTS */}
            {projects?.length > 0 && (

                <section id="projects" className="max-w-7xl mx-auto py-20 px-6">

                    <SectionTitle title="შესრულებული პროექტები" />

                    <div className="
        grid
        grid-cols-1
        sm:grid-cols-2
        lg:grid-cols-3
        xl:grid-cols-4
        gap-10
        justify-items-center
        mt-12
    ">

                        {projects.map((project) => (

                            <div
                                key={project.id}
                                className="animate-fadeIn w-full flex justify-center"
                            >
                                <ProjectCard project={project} />
                            </div>

                        ))}

                    </div>

                </section>

            )}
            {/*Contact*/}
            {siteSettings?.contact_header?.trim() && (
                <section id="contact" className="max-w-full mx-auto py-20 px-6">

                    <section className="max-w-7xl mx-auto py-20 px-6">
                        <SectionTitle title={siteSettings.contact_header} />
                    </section>

                    <Contact />

                </section>
            )}

        </div>
    )
}
