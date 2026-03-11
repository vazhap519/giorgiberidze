// import { router } from "@inertiajs/react"
//
// export default function ProductCard({ product }) {
// console.log(product)
//     const cardStyle = {
//         background: product.card_bg,
//         border: `1px solid ${product.card_border}`,
//         borderRadius: `${product.card_radius}px`
//     }
//
//     const imageStyle = {
//         background: product.image_bg
//     }
//
//     const titleStyle = {
//         color: product.title_color,
//         fontSize: `${product.title_size}px`,
//         fontWeight: product.title_weight
//     }
//
//     const overlayStyle = {
//         background: `linear-gradient(
//             135deg,
//             ${product.overlay_bg_from},
//             ${product.overlay_bg_via},
//             ${product.overlay_bg_to}
//         )`,
//         color: product.overlay_text_color
//     }
//
//     const featureStyle = {
//         color: product.feature_text_color,
//         fontSize: `${product.feature_text_size}px`
//     }
//
//     const iconStyle = {
//         color: product.feature_icon_color,
//         fontSize: `${product.feature_icon_size}px`
//     }
//
//     return (
//
//         <div
//             style={cardStyle}
//             onClick={() => router.visit(`/products/${product.slug}`)}
//             className="
//             group
//             w-full
//             max-w-[320px]
//             shadow-lg
//             transition-all
//             duration-500
//             hover:-translate-y-2
//             hover:shadow-2xl
//             cursor-pointer
//         "
//         >
//
//             {/* BASE CARD */}
//
//             <div className="group-hover:hidden">
//
//                 <div
//                     style={imageStyle}
//                     className="flex items-center justify-center p-10"
//                 >
//                     <img
//                         src={product.image_url}
//                         alt={product.title}
//                         className="object-contain h-[200px]"
//                     />
//                 </div>
//
//                 <div className="text-center pb-6 px-6">
//                     <h3
//                         style={titleStyle}
//                         className="break-all"
//                     >
//                         {product.title}
//                     </h3>
//                 </div>
//
//             </div>
//
//
//             {/* HOVER CONTENT */}
//
//             <div
//                 style={overlayStyle}
//                 className="
//                 hidden
//                 group-hover:block
//                 px-6
//                 py-8
//                 transition-all
//                 duration-500
//             "
//             >
//
//                 <h3
//                     style={titleStyle}
//                     className="mb-6 text-center break-all"
//                 >
//                     {product.title}
//                 </h3>
//
//                 <ul className="space-y-3">
//
//                     {Array.isArray(product.features) &&
//                         product.features.map((item,index)=> (
//
//                             <li
//                                 key={index}
//                                 className="flex items-start gap-2 break-all"
//                                 style={featureStyle}
//                             >
//
//                                 <span style={iconStyle}>✓</span>
//
//                                 <span className="break-all">
//                                     {item.filter} {item.value}
//                                 </span>
//
//                             </li>
//
//                         ))}
//
//                 </ul>
//
//             </div>
//
//         </div>
//
//     )
//
// }
import { router } from "@inertiajs/react"

export default function ProductCard({ product }) {

    const cardStyle = {
        background: product.card_bg,
        border: `1px solid ${product.card_border}`,
        borderRadius: `${product.card_radius}px`
    }

    const imageStyle = {
        background: product.image_bg
    }

    const titleStyle = {
        color: product.title_color,
        fontSize: `${product.title_size}px`,
        fontWeight: product.title_weight
    }

    const overlayStyle = {
        background: `linear-gradient(
            135deg,
            ${product.overlay_bg_from},
            ${product.overlay_bg_via},
            ${product.overlay_bg_to}
        )`,
        color: product.overlay_text_color
    }

    const featureStyle = {
        color: product.feature_text_color,
        fontSize: `${product.feature_text_size}px`
    }

    const iconStyle = {
        color: product.feature_icon_color,
        fontSize: `${product.feature_icon_size}px`
    }

    return (

        <div
            style={cardStyle}
            onClick={() => router.visit(`/products/${product.slug}`)}
            className="
            group
            relative
            w-full
            shadow-lg
            transition-all
            duration-500
            hover:-translate-y-2
            hover:shadow-2xl
            cursor-pointer
        "
        >

            {/* BASE CARD */}

            <div className="transition-opacity duration-500 group-hover:opacity-0">

                <div
                    style={imageStyle}
                    className="flex items-center justify-center p-10"
                >
                    <img
                        src={product.image_url}
                        alt={product.title}
                        className="object-contain h-[200px]"
                    />
                </div>

                <div className="text-center pb-6 px-6">
                    <h3
                        style={titleStyle}
                        className="break-all"
                    >
                        {product.title}
                    </h3>
                </div>

            </div>


            {/* HOVER CONTENT */}

            <div
                style={overlayStyle}
                className="
                absolute
                inset-0
                opacity-0
                group-hover:opacity-100
                px-6
                py-8
                transition-all
                duration-500
                flex
                flex-col
                justify-center
            "
            >

                <h3
                    style={titleStyle}
                    className="mb-6 text-center break-all"
                >
                    {product.title}
                </h3>

                <ul className="space-y-3">

                    {Array.isArray(product.features) &&
                        product.features.map((item,index)=> (

                            <li
                                key={index}
                                className="flex items-start gap-2 break-all"
                                style={featureStyle}
                            >

                                <span style={iconStyle}>✓</span>

                                <span>
                                    {item.filter} {item.value}
                                </span>

                            </li>

                        ))}

                </ul>

            </div>

        </div>

    )
}
