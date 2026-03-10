import { useState } from "react"
import { Swiper, SwiperSlide } from "swiper/react"
import { Navigation } from "swiper/modules"

import "swiper/css"
import "swiper/css/navigation"

export default function ProjectImageGallery({ images = [], videos = [] }) {

    const media = [
        ...images.map(src => ({ type: "image", src })),
        ...videos.map(src => ({ type: "video", src }))
    ]

    const [active, setActive] = useState(0)

    if (!media.length) return null

    return (

        <div className="max-w-6xl mx-auto">

            {/* MAIN MEDIA */}

            <div className="aspect-video rounded-2xl overflow-hidden shadow-xl mb-6 bg-black">

                {media[active].type === "image" ? (

                    <img
                        src={media[active].src}
                        className="w-full h-full object-cover"
                    />

                ) : (

                    <video
                        src={media[active].src}
                        controls
                        className="w-full h-full object-cover"
                    />

                )}

            </div>


            {/* THUMBNAILS */}

            <Swiper
                modules={[Navigation]}
                spaceBetween={12}
                slidesPerView={4}
                navigation
                breakpoints={{
                    640: { slidesPerView: 4 },
                    768: { slidesPerView: 5 },
                    1024: { slidesPerView: 6 }
                }}
            >

                {media.map((item, index) => (

                    <SwiperSlide key={index}>

                        <div
                            onClick={() => setActive(index)}
                            className={`
                                cursor-pointer
                                rounded-xl
                                overflow-hidden
                                border
                                ${active === index
                                ? "border-blue-600"
                                : "border-gray-200"}
                            `}
                        >

                            {item.type === "image" ? (

                                <img
                                    src={item.src}
                                    className="w-full h-20 object-cover"
                                />

                            ) : (

                                <video
                                    src={item.src}
                                    className="w-full h-20 object-cover"
                                />

                            )}

                        </div>

                    </SwiperSlide>

                ))}

            </Swiper>

        </div>

    )
}
