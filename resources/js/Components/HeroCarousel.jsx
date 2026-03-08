// import { Swiper, SwiperSlide } from "swiper/react"
// import { Navigation, Autoplay } from "swiper/modules"

// import "swiper/css"
// import "swiper/css/navigation"

// export default function HeroCarousel({ slides = [] }) {

//     if (!slides.length) return null

//     return (
//         <section className="relative w-full min-h-[650px] lg:h-[650px] overflow-hidden">

//             <Swiper
//                 modules={[Navigation, Autoplay]}
//                 navigation
//                 autoplay={{ delay: 6000 }}
//                 loop={slides.length > 1}
//                 className="h-full"
//             >

//                 {slides.map((slide) => (

//                     <SwiperSlide key={slide.id}>

//                         <div className="relative w-full min-h-[650px] lg:h-[650px]">

//                             {/* Background */}
//                             {slide.background_url && (
//                                 <img
//                                     src={slide.background_url}
//                                     alt={slide.title}
//                                     className="absolute inset-0 w-full h-full object-cover"
//                                 />
//                             )}

//                             {/* Overlay */}
//                             <div className="absolute inset-0 bg-black/30" />

//                             {/* Content */}
//                             <div className="
//                                 relative
//                                 max-w-7xl
//                                 mx-auto
//                                 min-h-[650px]
//                                 lg:h-full
//                                 flex
//                                 flex-col
//                                 lg:flex-row
//                                 items-center
//                                 justify-center
//                                 lg:justify-between
//                                 gap-12
//                                 px-6
//                                 pt-28
//                                 lg:pt-0
//                             ">

//                                 {/* LEFT CARD */}
//                                 <div className="
//                                     bg-transparent/40
//                                     backdrop-blur-xl
//                                     rounded-3xl
//                                     p-8
//                                     lg:p-10
//                                     max-w-xl
//                                     w-full
//                                     shadow-2xl
//                                     overflow-hidden
//                                     text-center
//                                     lg:text-left
//                                 ">

//                                     <h1 className="
//                                         text-3xl
//                                         md:text-4xl
//                                         lg:text-5xl
//                                         font-bold
//                                         text-gray-900
//                                         leading-tight
//                                         break-words
//                                     ">
//                                         {slide.title}
//                                     </h1>

//                                     {slide.subtitle && (
//                                         <p className="
//                                             mt-4
//                                             text-lg
//                                             text-gray-700
//                                             leading-relaxed
//                                             break-words
//                                         ">
//                                             {slide.subtitle}
//                                         </p>
//                                     )}

//                                     {slide.button_text && (
//                                         <a
//                                             href={slide.button_url || "#"}
//                                             className="
//                                                 inline-block
//                                                 mt-6
//                                                 px-7
//                                                 py-3
//                                                 border-2
//                                                 border-blue-600
//                                                 text-blue-600
//                                                 rounded-full
//                                                 text-center
//                                                 whitespace-normal
//                                                 break-words
//                                                 max-w-[300px]
//                                                 hover:bg-blue-600
//                                                 hover:text-white
//                                                 transition
//                                             "
//                                         >
//                                             {slide.button_text}
//                                         </a>
//                                     )}

//                                 </div>

//                                 {/* RIGHT IMAGE */}
//                                 {slide.image_url && (
//                                     <img
//                                         src={slide.image_url}
//                                         alt="product"
//                                         className="
//                                             w-[240px]
//                                             sm:w-[320px]
//                                             md:w-[380px]
//                                             lg:w-[480px]
//                                             object-contain
//                                             hero-float
//                                         "
//                                     />
//                                 )}

//                             </div>

//                         </div>

//                     </SwiperSlide>

//                 ))}

//             </Swiper>

//         </section>
//     )
// }
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

                {slides.map((slide) => (

                    <SwiperSlide key={slide.id}>

                        <div className="relative w-full h-[700px]">

                            {/* BACKGROUND */}
                            {slide.background_url && (
                                <img
                                    src={slide.background_url}
                                    alt={slide.title}
                                    className="absolute inset-0 w-full h-full object-cover"
                                />
                            )}

                            {/* DARK GRADIENT OVERLAY */}
                            <div className="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-transparent" />

                            {/* CONTENT */}
                            <div className="
                                relative
                                max-w-7xl
                                mx-auto
                                h-full
                                flex
                                items-center
                                justify-between
                                px-6
                            ">

                                {/* TEXT BLOCK */}
                                <div className="max-w-xl text-white">

                                    <h1 className="
                                        text-4xl
                                        md:text-5xl
                                        lg:text-6xl
                                        font-bold
                                        leading-tight
                                    ">
                                        {slide.title}
                                    </h1>

                                    {slide.subtitle && (
                                        <p className="
                                            mt-6
                                            text-lg
                                            text-gray-200
                                            leading-relaxed
                                        ">
                                            {slide.subtitle}
                                        </p>
                                    )}

                                    {/* BUTTONS */}
                                    <div className="flex flex-wrap gap-4 mt-8">

                                        {slide.button_text && (
                                            <a
                                                href={slide.button_url || "#"}
                                                className="
                                                    px-7
                                                    py-3
                                                    bg-blue-600
                                                    text-white
                                                    rounded-xl
                                                    font-semibold
                                                    hover:bg-blue-700
                                                    transition
                                                    shadow-lg
                                                "
                                            >
                                                {slide.button_text}
                                            </a>
                                        )}

                                        <a
                                            href="#services"
                                            className="
                                                px-7
                                                py-3
                                                border
                                                border-white
                                                text-white
                                                rounded-xl
                                                hover:bg-white
                                                hover:text-black
                                                transition
                                            "
                                        >
                                             {slide.button_text}
                                        </a>

                                    </div>

                                </div>

                                {/* PRODUCT IMAGE */}
                                {slide.image_url && (
                                    <img
                                        src={slide.image_url}
                                        alt="product"
                                        className="
                                            hidden lg:block
                                            w-[520px]
                                            object-contain
                                            drop-shadow-2xl
                                            animate-float
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