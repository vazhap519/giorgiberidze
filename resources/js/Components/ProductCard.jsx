
import { useState } from "react"

export default function ProductCard({ product }) {

    const [open,setOpen]=useState(false)

    const cardStyle={
        background:product.card_bg,
        border:`1px solid ${product.card_border}`,
        borderRadius:`${product.card_radius}px`
    }

    const imageStyle={
        background:product.image_bg
    }

    const titleStyle={
        color:product.title_color,
        fontSize:`${product.title_size}px`,
        fontWeight:product.title_weight
    }

    const overlayStyle={
        background:`linear-gradient(135deg,
            ${product.overlay_bg_from},
            ${product.overlay_bg_via},
            ${product.overlay_bg_to})`,
        color:product.overlay_text_color
    }

    const featureStyle={
        color:product.feature_text_color,
        fontSize:`${product.feature_text_size}px`
    }

    const iconStyle={
        color:product.feature_icon_color,
        fontSize:`${product.feature_icon_size}px`
    }

    return (

        <div
            style={cardStyle}
            onClick={()=>setOpen(!open)}
            className="
            group relative
            w-full max-w-[320px]
            h-[420px]
            overflow-hidden
            shadow-lg
            transition
            duration-500
            hover:-translate-y-3
            hover:shadow-2xl
            cursor-pointer
        ">

            {/* IMAGE */}

            <div
                style={imageStyle}
                className="flex items-center justify-center h-full p-10"
            >

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
                absolute bottom-6 left-0 w-full text-center px-6
                transition duration-500
                group-hover:opacity-0
            ">

                <h3 style={titleStyle}>
                    {product.title}
                </h3>

            </div>


            {/* OVERLAY */}

            <div
                style={overlayStyle}
                className={`
                absolute inset-0
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

                <h3
                    style={titleStyle}
                    className="mb-6"
                >
                    {product.title}
                </h3>

                <ul className="space-y-3">

                    {product.features?.map((item,index)=>(

                        <li
                            key={index}
                            className="flex items-center gap-2 text-left"
                            style={featureStyle}
                        >

                            <span style={iconStyle}>
                                ✓
                            </span>

                            <span>{item.feature}</span>

                        </li>

                    ))}

                </ul>

            </div>

        </div>

    )
}
