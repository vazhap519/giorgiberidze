import React, { useState } from "react"
import { usePage } from "@inertiajs/react"
import SeoHead from "../Components/SeoHead.jsx"
import HeroCarousel from "@/Components/HeroCarousel.jsx"
import ProductCard from "@/Components/ProductCard.jsx"

export default function Home() {

    const { seo, slides, products } = usePage().props

    const [visible, setVisible] = useState(3)

    const loadMore = () => {
        setVisible((prev) => prev + 3)
    }

    const visibleProducts = products.slice(0, visible)

    return (
        <div>

            <SeoHead seo={seo} pageTitle="Home" />

            <HeroCarousel slides={slides} />

            {/* PRODUCTS */}
            <section className="max-w-7xl mx-auto py-20 px-6">

                <div className="
        grid
        grid-cols-1
        sm:grid-cols-2
        lg:grid-cols-3
        xl:grid-cols-4
        gap-10
        justify-items-center
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

                {/* LOAD MORE BUTTON */}

                {visible < products.length && (

                    <div className="flex justify-center mt-12">

                        <button
                            onClick={loadMore}
                            className="px-8 py-3 rounded-full bg-blue-600 text-white font-semibold hover:bg-blue-700 transition"
                        >
                            სხვა პროდუქტები
                        </button>

                    </div>

                )}

            </section>

        </div>
    )
}
