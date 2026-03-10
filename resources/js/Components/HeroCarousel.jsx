import { Swiper, SwiperSlide } from "swiper/react"
import { Navigation, Autoplay } from "swiper/modules"

import "swiper/css"
import "swiper/css/navigation"

export default function HeroCarousel({ slides = [] }) {

    if (!slides.length) return null

    return (
        <section className="relative w-full h-[700px] overflow-hidden">

            <Swiper
                modules={[Navigation, Autoplay]}
                navigation
                autoplay={{ delay: 6000 }}
                loop={slides.length > 1}
                className="h-full"
            >

                {slides.map((slide) => {

                    const styles = slide.styles ?? {}

                    /* DEFAULTS */

                    const radius = styles.button_radius ?? 12
                    const fontSize = styles.button_font_size ?? 16
                    const borderWidth = styles.button_border_width ?? 0
                    const opacity = styles.button_opacity ?? 100

                    return (

                        <SwiperSlide key={slide.id}>

                            <div className="relative w-full h-[700px] overflow-hidden">

                                {/* BACKGROUND IMAGE */}

                                {slide.background_url && (
                                    <img
                                        src={slide.background_url}
                                        alt={slide.title}
                                        className="absolute inset-0 w-full h-full object-cover"
                                    />
                                )}

                                {/* GRADIENT OVERLAY */}

                                <div
                                    className="absolute inset-0 z-10"
                                    style={{
                                        background: `linear-gradient(
                                            to right,
                                            ${styles.gradient_from || "rgba(0,0,0,0.65)"},
                                            ${styles.gradient_to || "rgba(0,0,0,0.2)"}
                                        )`
                                    }}
                                />

                                {/* SECTION COLOR (optional) */}

                                {styles.section_bg && (
                                    <div
                                        className="absolute inset-0 z-0"
                                        style={{
                                            backgroundColor: styles.section_bg,
                                            opacity: 0.2
                                        }}
                                    />
                                )}

                                {/* CONTENT */}

                                <div className="relative z-20 max-w-7xl mx-auto h-full flex items-center justify-between px-6">

                                    {/* TEXT */}

                                    <div className="max-w-xl">

                                        <h1
                                            className={`${styles.title_size || "text-5xl"} font-bold leading-tight`}
                                            style={{ color: styles.title_color || "#fff" }}
                                        >
                                            {slide.title}
                                        </h1>

                                        {slide.subtitle && (
                                            <p
                                                className="mt-6 text-lg leading-relaxed"
                                                style={{ color: styles.subtitle_color || "#ddd" }}
                                            >
                                                {slide.subtitle}
                                            </p>
                                        )}

                                        {/* BUTTONS */}

                                        <div className="flex flex-wrap gap-4 mt-8">

                                            {/* BUTTON 1 */}

                                            {slide.button_text && (
                                                <a
                                                    href={slide.button_url || "#"}
                                                    target="_self"
                                                    className="px-7 py-3 font-semibold transition-all duration-300 shadow-lg hover:scale-105 hover:shadow-xl"
                                                    style={{
                                                        backgroundColor: styles.button_bg || "#2563eb",
                                                        color: styles.button_text || "#fff",
                                                        borderRadius: `${radius}px`,
                                                        opacity: opacity / 100,
                                                        border: `${borderWidth}px solid ${styles.button_border_color || "transparent"}`,
                                                        fontSize: `${fontSize}px`
                                                    }}
                                                >
                                                    {slide.button_text}
                                                </a>
                                            )}

                                            {/* BUTTON 2 */}

                                            {slide.button2_text && (
                                                <a
                                                    href={slide.button2_url || "#"}
                                                    target="_self"
                                                    className="px-7 py-3 transition-all duration-300 hover:scale-105"
                                                    style={{
                                                        backgroundColor: styles.button2_bg || "transparent",
                                                        color: styles.button2_text || "#fff",
                                                        borderRadius: `${radius}px`,
                                                        opacity: opacity / 100,
                                                        border: `${borderWidth}px solid ${styles.button2_border || styles.button_border_color || "#fff"}`,
                                                        fontSize: `${fontSize}px`
                                                    }}
                                                >
                                                    {slide.button2_text}
                                                </a>
                                            )}

                                        </div>

                                    </div>

                                    {/* PRODUCT IMAGE */}

                                    {slide.image_url && (
                                        <img
                                            src={slide.image_url}
                                            alt="product"
                                            className="hidden lg:block w-[520px] object-contain drop-shadow-2xl animate-float"
                                        />
                                    )}

                                </div>

                            </div>

                        </SwiperSlide>

                    )

                })}

            </Swiper>

        </section>
    )
}
