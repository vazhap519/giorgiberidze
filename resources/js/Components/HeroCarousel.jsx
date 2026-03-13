import { Swiper, SwiperSlide } from "swiper/react"
import { Navigation, Autoplay } from "swiper/modules"

import "swiper/css"
import "swiper/css/navigation"

export default function HeroCarousel({ slides = [] }) {

    if (!slides.length) return null

    return (

        <section className="relative w-full h-[70vh] min-h-[420px] md:h-[80vh] overflow-hidden">

            <Swiper
                modules={[Navigation, Autoplay]}
                navigation={slides.length > 1}
                autoplay={{ delay: 6000 }}
                loop={slides.length > 1}
                className="w-full h-full"
            >

                {slides.map((slide) => {

                    const styles = slide.styles ?? {}

                    const radius = styles.button_radius ?? 12
                    const fontSize = styles.button_font_size ?? 16
                    const borderWidth = styles.button_border_width ?? 0
                    const opacity = styles.button_opacity ?? 100

                    return (

                        <SwiperSlide key={slide.id}>

                            <div className="relative w-full h-full">

                                {/* BACKGROUND */}

                                {slide.background_url && (

                                    <img
                                        src={slide.background_url}
                                        alt={slide.title}
                                        className="absolute inset-0 w-full h-full object-cover"
                                    />

                                )}

                                {/* OVERLAY */}

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

                                {/* CONTENT */}

                                <div className="relative z-20 w-full max-w-[1400px] mx-auto h-full flex flex-col lg:flex-row items-center justify-between px-6 gap-10">

                                    {/* TEXT */}

                                    <div className="max-w-xl text-center lg:text-left">

                                        <h1
                                            className={`${styles.title_size || "text-3xl md:text-4xl lg:text-5xl"} font-bold leading-tight`}
                                            style={{ color: styles.title_color || "#fff" }}
                                        >
                                            {slide.title}
                                        </h1>

                                        {slide.subtitle && (

                                            <p
                                                className="mt-6 text-base md:text-lg leading-relaxed"
                                                style={{ color: styles.subtitle_color || "#ddd" }}
                                            >
                                                {slide.subtitle}
                                            </p>

                                        )}

                                        <div className="flex flex-wrap justify-center lg:justify-start gap-4 mt-8">

                                            {slide.button_text && (

                                                <a
                                                    href={slide.button_url || "#"}
                                                    className="px-6 py-3 font-semibold transition-all duration-300 shadow-lg hover:scale-105"
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

                                            {slide.button2_text && (

                                                <a
                                                    href={slide.button2_url || "#"}
                                                    className="px-6 py-3 transition-all duration-300 hover:scale-105"
                                                    style={{
                                                        backgroundColor: styles.button2_bg || "transparent",
                                                        color: styles.button2_text || "#fff",
                                                        borderRadius: `${radius}px`,
                                                        opacity: opacity / 100,
                                                        border: `${borderWidth}px solid ${styles.button2_border || "#fff"}`,
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
                                            className="block w-full max-w-[260px] md:max-w-[420px] xl:max-w-[520px] object-contain drop-shadow-2xl hero-float"
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
