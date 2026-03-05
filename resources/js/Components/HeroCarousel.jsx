import { Swiper, SwiperSlide } from "swiper/react"
import { Navigation, Autoplay } from "swiper/modules"

import "swiper/css"
import "swiper/css/navigation"

export default function HeroCarousel({ slides = [] }) {

    if (!slides.length) return null

    return (
        <section className="relative w-full h-[650px] overflow-hidden">

            <Swiper
                modules={[Navigation, Autoplay]}
                navigation
                autoplay={{ delay: 6000 }}
                loop={slides.length > 1}
                className="h-full"
            >

                {slides.map((slide) => (

                    <SwiperSlide key={slide.id}>

                        <div className="relative w-full h-[650px]">

                            {/* Background */}
                            {slide.background_url && (
                                <img
                                    src={slide.background_url}
                                    alt={slide.title}
                                    className="absolute inset-0 w-full h-full object-cover"
                                />
                            )}

                            {/* Overlay */}
                            <div className="absolute inset-0 bg-black/30" />

                            {/* Content */}
                            <div className="relative max-w-7xl mx-auto h-full flex flex-col lg:flex-row items-center justify-between gap-10 px-6">

                                {/* LEFT CARD */}
                                <div className="bg-transparent/40 backdrop-blur-xl rounded-3xl p-8 lg:p-10 max-w-xl w-full shadow-2xl overflow-hidden">

                                    <h1 className="text-3xl lg:text-5xl font-bold text-gray-900 leading-tight wrap-break-word text-balance">
                                        {slide.title}
                                    </h1>

                                    {slide.subtitle && (
                                        <p className="mt-4 text-lg text-gray-700 leading-relaxed wrap-break-word">
                                            {slide.subtitle}
                                        </p>
                                    )}

                                    {slide.button_text && (
                                        <a
                                            href={slide.button_url || "#"}
                                            className="
  inline-block
    mt-6
    px-7 py-3
    border-2 border-blue-600
    text-blue-600
    rounded-full
    text-center
    whitespace-normal
    wrap-break-word
    max-w-[300px]
    hover:bg-blue-600 hover:text-white
    transition
                      "
                                        >
                                            {slide.button_text}
                                        </a>
                                    )}

                                </div>

                                {/* RIGHT IMAGE */}
                                {slide.image_url && (
                                    <img
                                        src={slide.image_url}
                                        alt="product"
                                        className="
                      w-[260px]
                      sm:w-[320px]
                      lg:w-[480px]
                      object-contain
                      hero-float
                    "
                                    />
                                )}

                            </div>

                        </div>

                    </SwiperSlide>

                ))}

            </Swiper>

        </section>
    )
}
