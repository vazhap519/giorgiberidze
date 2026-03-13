// import { useState } from "react"
//
// import { Swiper, SwiperSlide } from "swiper/react"
// import { FreeMode, Navigation, Thumbs } from "swiper/modules"
//
// import "swiper/css"
// import "swiper/css/free-mode"
// import "swiper/css/navigation"
// import "swiper/css/thumbs"
//
// export default function PersonGallery({ person }) {
//
//     const [thumbsSwiper, setThumbsSwiper] = useState(null)
//
//     const images = person.images || []
//
//     if (!images.length) return null
//
//
//     /* ----------------------------- */
//     /* Dynamic Styles from Backend */
//     /* ----------------------------- */
//
//     const styles = {
//
//         card: {
//             borderRadius: `${person.person_card_radius || 16}px`,
//             boxShadow: person.person_shadow
//                 ? `0 10px 30px rgba(0,0,0,0.15)`
//                 : "none"
//         },
//
//         overlay: {
//             background: person.person_overlay_color || "rgba(0,0,0,0.6)",
//             backdropFilter: person.person_blur
//                 ? `blur(${person.person_blur}px)`
//                 : "none"
//         },
//
//         text: {
//             color: person.person_text_color || "#ffffff",
//             textAlign: person.person_text_align || "center"
//         },
//
//         name: {
//             fontSize: `${person.person_name_size || 22}px`
//         },
//
//         position: {
//             fontSize: `${person.person_position_size || 16}px`
//         },
//
//         experience: {
//             fontSize: `${person.experience_size || 36}px`
//         }
//
//     }
//
//
//     return (
//
//         <div className="w-full">
//
//             {/* ---------------- BIG SLIDER ---------------- */}
//
//             <Swiper
//                 spaceBetween={10}
//                 navigation
//                 thumbs={{ swiper: thumbsSwiper }}
//                 modules={[FreeMode, Navigation, Thumbs]}
//                 className="rounded-2xl overflow-hidden mb-4"
//             >
//
//                 {images.map((img, index) => (
//
//                     <SwiperSlide key={index}>
//
//                         <div
//                             style={styles.card}
//                             className="group relative h-[260px] sm:h-[320px] md:h-[420px] overflow-hidden"
//                         >
//
//                             <img
//                                 src={img}
//                                 alt={person.person_name}
//                                 className="w-full h-full object-cover"
//                             />
//
//                             {/* INFO OVERLAY */}
//
//                             <div
//                                 style={styles.overlay}
//                                 className="
//                                     absolute inset-0
//                                     flex items-center justify-center
//                                     px-4
//                                     opacity-100 md:opacity-0
//                                     md:group-hover:opacity-100
//                                     transition duration-300
//                                 "
//                             >
//
//                                 <div style={styles.text}>
//
//                                     <h3
//                                         style={styles.name}
//                                         className="font-bold"
//                                     >
//                                         {person.person_name}
//                                     </h3>
//
//                                     <p
//                                         style={styles.position}
//                                         className="opacity-80"
//                                     >
//                                         {person.person_position}
//                                     </p>
//
//                                     <p
//                                         style={styles.experience}
//                                         className="font-bold mt-3"
//                                     >
//                                         {person.person_experience_years}
//                                     </p>
//
//                                     <p className="text-sm opacity-80">
//                                         {person.person_experience_description}
//                                     </p>
//
//                                 </div>
//
//                             </div>
//
//                         </div>
//
//                     </SwiperSlide>
//
//                 ))}
//
//             </Swiper>
//
//
//
//             {/* ---------------- THUMBNAILS ---------------- */}
//
//             <Swiper
//                 onSwiper={setThumbsSwiper}
//                 spaceBetween={8}
//                 freeMode
//                 watchSlidesProgress
//                 modules={[FreeMode, Navigation, Thumbs]}
//
//                 breakpoints={{
//                     0: {
//                         slidesPerView: 3
//                     },
//                     640: {
//                         slidesPerView: 4
//                     },
//                     1024: {
//                         slidesPerView: 5
//                     }
//                 }}
//             >
//
//                 {images.map((img, index) => (
//
//                     <SwiperSlide key={index}>
//
//                         <img
//                             src={img}
//                             alt=""
//                             className="
//                                 h-[60px]
//                                 sm:h-[70px]
//                                 md:h-[80px]
//                                 w-full
//                                 object-cover
//                                 rounded-lg
//                                 cursor-pointer
//                                 hover:opacity-80
//                                 transition
//                             "
//                         />
//
//                     </SwiperSlide>
//
//                 ))}
//
//             </Swiper>
//
//         </div>
//     )
// }

import { useState } from "react"

import { Swiper, SwiperSlide } from "swiper/react"
import { FreeMode, Navigation, Thumbs } from "swiper/modules"

import "swiper/css"
import "swiper/css/free-mode"
import "swiper/css/navigation"
import "swiper/css/thumbs"

export default function PersonGallery({ person }) {

    const [thumbsSwiper, setThumbsSwiper] = useState(null)

    const images = person.images || []

    if (!images.length) return null


    /* ----------------------------- */
    /* Dynamic Styles */
    /* ----------------------------- */

    const styles = {

        card: {
            borderRadius: `${person.person_card_radius || 16}px`,
            boxShadow: person.person_shadow
                ? "0 10px 30px rgba(0,0,0,0.15)"
                : "none"
        },

        overlay: {
            background: person.person_overlay_color || "rgba(0,0,0,0.6)",
            backdropFilter: person.person_blur
                ? `blur(${person.person_blur}px)`
                : "none"
        },

        text: {
            color: person.person_text_color || "#fff",
            textAlign: person.person_text_align || "center"
        },

        name: {
            fontSize: `${person.person_name_size || 22}px`
        },

        position: {
            fontSize: `${person.person_position_size || 16}px`
        },

        experience: {
            fontSize: `${person.experience_size || 32}px`
        }

    }

    return (

        <div className="w-full">

            {/* BIG SLIDER */}

            <Swiper
                spaceBetween={10}
                navigation
                thumbs={{ swiper: thumbsSwiper }}
                modules={[FreeMode, Navigation, Thumbs]}
                className="rounded-2xl overflow-hidden mb-3"
            >

                {images.map((img, index) => (

                    <SwiperSlide key={index}>

                        <div
                            style={styles.card}
                            className="
                                group
                                relative
                                overflow-hidden
                                h-[200px]
                                sm:h-[260px]
                                md:h-[380px]
                                lg:h-[420px]
                            "
                        >

                            <img
                                src={img}
                                alt={person.person_name}
                                className="w-full h-full object-cover"
                            />

                            {/* OVERLAY */}

                            <div
                                style={styles.overlay}
                                className="
                                    absolute inset-0
                                    flex items-center justify-center
                                    px-4
                                    opacity-100
                                    md:opacity-0
                                    md:group-hover:opacity-100
                                    transition duration-300
                                "
                            >

                                <div style={styles.text}>

                                    <h3
                                        style={styles.name}
                                        className="font-bold"
                                    >
                                        {person.person_name}
                                    </h3>

                                    <p
                                        style={styles.position}
                                        className="opacity-80"
                                    >
                                        {person.person_position}
                                    </p>

                                    <p
                                        style={styles.experience}
                                        className="font-bold mt-2"
                                    >
                                        {person.person_experience_years}
                                    </p>

                                    <p className="text-xs md:text-sm opacity-80">
                                        {person.person_experience_description}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </SwiperSlide>

                ))}

            </Swiper>



            {/* THUMBNAILS */}

            <Swiper
                onSwiper={setThumbsSwiper}
                spaceBetween={8}
                freeMode
                watchSlidesProgress
                modules={[FreeMode, Navigation, Thumbs]}

                breakpoints={{
                    0: {
                        slidesPerView: 3
                    },
                    640: {
                        slidesPerView: 4
                    },
                    1024: {
                        slidesPerView: 5
                    }
                }}
            >

                {images.map((img, index) => (

                    <SwiperSlide key={index}>

                        <img
                            src={img}
                            alt=""
                            className="
                                h-[55px]
                                sm:h-[65px]
                                md:h-[75px]
                                w-full
                                object-cover
                                rounded-lg
                                cursor-pointer
                                hover:opacity-80
                                transition
                            "
                        />

                    </SwiperSlide>

                ))}

            </Swiper>

        </div>
    )
}
