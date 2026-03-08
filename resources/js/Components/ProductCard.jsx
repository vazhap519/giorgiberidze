// import { useState } from "react"

// export default function ProductCard({ product }) {

//     const [open, setOpen] = useState(false)

//     return (
//         <div
//             onClick={() => setOpen(!open)}
//             className="
//             group relative
//             w-[320px] h-[420px]
//             rounded-2xl
//             overflow-hidden
//             bg-white
//             shadow-xl
//             transition-all
//             duration-500
//             hover:-translate-y-3
//             hover:shadow-2xl
//             cursor-pointer
//         ">

//             {/* IMAGE */}
//             <div className="flex items-center justify-center h-full p-8">

//                 <img
//                     src={product.image_url}
//                     alt={product.title}
//                     className="
//                     object-contain
//                     h-full
//                     hero-float
//                     transition-transform
//                     duration-500
//                     group-hover:scale-110
//                 "
//                 />

//             </div>

//             {/* OVERLAY */}
//             <div
//                 className={`
//                 absolute inset-y-0 right-0 w-full
//                 bg-black/85 text-white
//                 px-6 pt-14
//                 flex flex-col
//                 items-center
//                 text-center
//                 transition-transform duration-500

//                 ${open ? "translate-x-0" : "translate-x-full"}

//                 lg:translate-x-full
//                 lg:group-hover:translate-x-0
//             `}
//             >

//                 <h3 className="text-xl font-bold mb-4 break-words max-w-[220px]">
//                     {product.title}
//                 </h3>

//                 <ul className="space-y-2 text-sm leading-relaxed max-w-[220px]">

//                     {product.features?.map((item, index) => (
//                         <li key={index} className="break-words">
//                             {item.feature}
//                         </li>
//                     ))}

//                 </ul>

//             </div>

//         </div>
//     )
// }
import { useState } from "react"

export default function ProductCard({ product }) {

    const [open, setOpen] = useState(false)

    return (
        <div
            onClick={() => setOpen(!open)}
            className="
            group relative
            w-full max-w-[320px]
            h-[420px]
            rounded-2xl
            overflow-hidden
            bg-white
            shadow-lg
            transition
            duration-500
            hover:-translate-y-3
            hover:shadow-2xl
            cursor-pointer
        ">

            {/* IMAGE */}
            <div className="flex items-center justify-center h-full p-10">

                <img
                    src={product.image_url}
                    alt={product.title}
                    className="
                    object-contain
                    h-[220px]
                    transition-transform
                    duration-500
                    group-hover:scale-110
                "
                />

            </div>

            {/* TITLE */}
            <div className="
                absolute
                bottom-6
                left-0
                w-full
                text-center
                px-6
                transition
                duration-500
                group-hover:opacity-0
            ">

                <h3 className="text-lg font-semibold text-gray-800">
                    {product.title}
                </h3>

            </div>

            {/* OVERLAY */}
            <div
                className={`
                absolute inset-0
                bg-gradient-to-br from-blue-700 via-blue-600 to-blue-500
                text-white
                px-6 py-10
                flex flex-col
                items-center
                text-center
                transition-transform duration-500

                ${open ? "translate-x-0" : "translate-x-full"}

                lg:translate-x-full
                lg:group-hover:translate-x-0
            `}
            >

                <h3 className="text-xl font-bold mb-6">
                    {product.title}
                </h3>

                <ul className="space-y-3 text-sm">

                    {product.features?.map((item, index) => (
                        <li
                            key={index}
                            className="flex items-center gap-2 text-left"
                        >

                            <span className="text-green-300 text-lg">✓</span>

                            <span>{item.feature}</span>

                        </li>
                    ))}

                </ul>

            </div>

        </div>
    )
}