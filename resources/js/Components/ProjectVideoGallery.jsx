import { useState } from "react"
import { Swiper, SwiperSlide } from "swiper/react"
import { Navigation } from "swiper/modules"

import "swiper/css"
import "swiper/css/navigation"

export default function ProjectVideoGallery({ videos }) {

    const [active,setActive]=useState(0)

    if(!videos?.length) return null

    return(

        <div className="max-w-6xl mx-auto">

            {/* MAIN VIDEO */}

            <div className="aspect-video rounded-2xl overflow-hidden shadow-xl mb-6 bg-black">

                <video
                    src={videos[active]}
                    controls
                    className="w-full h-full object-cover"
                />

            </div>

            {/* THUMBNAILS */}

            <Swiper
                modules={[Navigation]}
                spaceBetween={12}
                slidesPerView={4}
                navigation
                breakpoints={{
                    640:{slidesPerView:3},
                    768:{slidesPerView:4},
                    1024:{slidesPerView:5}
                }}
            >

                {videos.map((video,index)=>(
                    <SwiperSlide key={index}>

                        <div
                            onClick={()=>setActive(index)}
                            className={`
                                cursor-pointer
                                rounded-xl
                                overflow-hidden
                                border
                                ${active===index
                                ? "border-blue-600"
                                : "border-gray-200"}
                            `}
                        >

                            <video
                                src={video}
                                className="w-full h-20 object-cover"
                            />

                        </div>

                    </SwiperSlide>
                ))}

            </Swiper>

        </div>

    )
}
