import { Swiper, SwiperSlide } from "swiper/react"
import { Autoplay } from "swiper/modules"

import "swiper/css"

export default function Partners({ partners = [] }) {

    return (

        <section className="w-full py-6 bg-white">

            <div className="max-w-7xl mx-auto px-6">

                <Swiper
                    modules={[Autoplay]}
                    spaceBetween={10}
                    slidesPerView={5}
                    loop={true}
                    autoplay={{
                        delay: 0,
                        disableOnInteraction: false,
                    }}
                    speed={4000}
                    breakpoints={{
                        640: { slidesPerView: 3 },
                        768: { slidesPerView: 4 },
                        1024: { slidesPerView: 5 },
                        1280: { slidesPerView: 6 }
                    }}
                >

                    {partners.map((partner) => {

                        const s = partner.styles || {}

                        return (

                            <SwiperSlide key={partner.id}>

                                <img
                                    src={partner.image_url}
                                    alt={partner.title}
                                    style={{

                                        height: `${s.height ?? 80}px`,
                                        borderRadius: `${s.radius ?? 12}px`,
                                        padding: `${s.padding ?? 0}px`,
                                        margin: `${s.margin ?? 0}px`,
                                        background: s.background ?? "transparent",
                                        opacity: s.opacity ?? 1,

                                        border: s.borderWidth
                                            ? `${s.borderWidth}px solid ${s.borderColor ?? "#e5e7eb"}`
                                            : "none",

                                        filter: `
grayscale(${s.filters?.grayscale ?? 0}%)
blur(${s.filters?.blur ?? 0}px)
brightness(${s.filters?.brightness ?? 100}%)
contrast(${s.filters?.contrast ?? 100}%)
`

                                    }}
                                    className="object-contain transition duration-300 hover:grayscale-0"
                                />

                            </SwiperSlide>

                        )

                    })}

                </Swiper>

            </div>

        </section>

    )

}
