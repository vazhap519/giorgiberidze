import { useState } from "react"

export default function ServiceCard({ service }) {

    const [open,setOpen]=useState(false)

    /*
    |--------------------------------------------------------------------------
    | Styles from CMS
    |--------------------------------------------------------------------------
    */

    const cardStyle={
        background:service.card_bg || "#ffffff",
        borderColor:service.card_border || "#e5e7eb",
        borderRadius:`${service.card_radius || 16}px`
    }

    const imageStyle={
        background:service.image_bg || "#f9fafb"
    }

    const titleStyle={
        color:service.title_color || "#111827"
    }

    const descStyle={
        color:service.description_color || "#4b5563"
    }

    const buttonStyle={
        background:service.button_bg || "#2563eb",
        color:service.button_text_color || "#ffffff"
    }

    const paddingStyle={
        padding:`${service.card_padding || 24}px`
    }

    /*
    |--------------------------------------------------------------------------
    | Hover Effects (CMS)
    |--------------------------------------------------------------------------
    */

    const hoverEffects={
        none:"",
        lift:"hover:-translate-y-2",
        scale:"hover:scale-105",
        shadow:"hover:shadow-2xl"
    }

    const shadowClass={
        md:"shadow-md",
        lg:"shadow-lg",
        xl:"shadow-xl",
        "2xl":"shadow-2xl"
    }

    /*
    |--------------------------------------------------------------------------
    | Hover Handlers
    |--------------------------------------------------------------------------
    */

    const handleTitleHover=(e,color)=>{
        if(color){
            e.currentTarget.style.color=color
        }
    }

    const handleButtonHover=(e,color)=>{
        if(color){
            e.currentTarget.style.background=color
        }
    }

    return(

        <div
            style={cardStyle}
            className={`
group
border
transition
duration-500
w-full
max-w-sm
overflow-hidden
${shadowClass[service.card_hover_shadow] || "shadow-md"}
${hoverEffects[service.card_hover_effect] || ""}
`}
        >

            {/* IMAGE */}

            {service.image_url && (

                <div
                    style={imageStyle}
                    className="flex items-center justify-center h-44 p-6"
                >

                    <img
                        src={service.image_url}
                        alt={service.title}
                        className="
h-24
object-contain
transition-transform
duration-500
group-hover:scale-110
"
                    />

                </div>

            )}

            {/* CONTENT */}

            <div style={paddingStyle} className="text-center">

                <h3
                    style={titleStyle}
                    onMouseEnter={(e)=>handleTitleHover(e,service.title_hover_color)}
                    onMouseLeave={(e)=>handleTitleHover(e,service.title_color)}
                    className="text-lg font-semibold transition"
                >
                    {service.title}
                </h3>

                {/* DESCRIPTION */}

                <div
                    className={`
overflow-hidden
transition-all
duration-500
${open ? "max-h-[300px] opacity-100 mt-4" : "max-h-0 opacity-0"}
`}
                >

                    <p style={descStyle} className="text-sm leading-relaxed">
                        {service.description}
                    </p>

                </div>

                {/* BUTTON */}

                <button
                    onClick={()=>setOpen(!open)}
                    style={buttonStyle}
                    onMouseEnter={(e)=>handleButtonHover(e,service.button_hover_bg)}
                    onMouseLeave={(e)=>handleButtonHover(e,service.button_bg)}
                    className="
mt-6
inline-flex
items-center
gap-2
px-6
py-2.5
rounded-xl
text-sm
font-medium
transition
"
                >

                    {open ? "დახურვა" : (service.read_more_text || "შეიტყვე მეტი")}

                </button>

            </div>

        </div>

    )
}
