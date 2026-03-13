import { useState } from "react";
import MainLayout from "@/Layouts/MainLayout.jsx";

export default function ProductShow({ product, siteSettings }) {

    const [tab,setTab] = useState("overview")
    const [activeImage,setActiveImage] = useState(product.image_url)

    const settings = {
        single_image_radius: siteSettings?.single_image_radius ?? 12,
        single_image_max_height: siteSettings?.single_image_max_height ?? 500,

        single_gallery_thumb_width: siteSettings?.single_gallery_thumb_width ?? 80,
        single_gallery_thumb_height: siteSettings?.single_gallery_thumb_height ?? 80,
        single_gallery_border_color: siteSettings?.single_gallery_border_color ?? "#e5e7eb",
        single_gallery_hover_border: siteSettings?.single_gallery_hover_border ?? "#ef4444",

        single_title_font_size: siteSettings?.single_title_font_size ?? 24,
        single_title_color: siteSettings?.single_title_color ?? "#000000",

        single_description_color: siteSettings?.single_description_color ?? "#6b7280",
        single_description_font_size: siteSettings?.single_description_font_size ?? 16,

        single_feature_icon_color: siteSettings?.single_feature_icon_color ?? "#22c55e",
        single_feature_font_size: siteSettings?.single_feature_font_size ?? 15,

        single_tabs_border_color: siteSettings?.single_tabs_border_color ?? "#e5e7eb",
        single_tabs_active_border: siteSettings?.single_tabs_active_border ?? "#000000",
        single_tabs_font_size: siteSettings?.single_tabs_font_size ?? 16,

        single_spec_table_border: siteSettings?.single_spec_table_border ?? "#e5e7eb",
        single_spec_label_bg: siteSettings?.single_spec_label_bg ?? "#f9fafb",

        single_download_btn_bg: siteSettings?.single_download_btn_bg ?? "#000000",
        single_download_btn_hover: siteSettings?.single_download_btn_hover ?? "#333333",
        single_download_btn_text: siteSettings?.single_download_btn_text ?? "#ffffff",
        single_download_btn_radius: siteSettings?.single_download_btn_radius ?? 6,
        single_download_btn_size: siteSettings?.single_download_btn_size ?? 14,

        single_download_card_radius: siteSettings?.single_download_card_radius ?? 6,
        single_download_card_border: siteSettings?.single_download_card_border ?? "#e5e7eb",
        single_download_card_hover: siteSettings?.single_download_card_hover ?? "#f9fafb",
    }

    return (

        <MainLayout>

            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">

                {/* PRODUCT GRID */}

                <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-start">

                    {/* IMAGE */}

                    <div className="w-full">

                        <img
                            src={activeImage || "/images/no-image.png"}
                            alt={product.title}
                            className="w-full h-auto object-contain rounded-xl"
                            style={{
                                borderRadius: `${settings.single_image_radius}px`,
                                maxHeight: `${settings.single_image_max_height}px`
                            }}
                        />

                        {/* GALLERY */}

                        {product.gallery?.length > 0 && (

                            <div className="flex gap-3 mt-6 overflow-x-auto pb-2">

                                {product.gallery.map((img,i)=>(

                                    <img
                                        key={i}
                                        src={img.url}
                                        onClick={()=>setActiveImage(img.url)}
                                        className="object-cover border rounded cursor-pointer transition hover:scale-105 flex-shrink-0"
                                        style={{
                                            width: `${settings.single_gallery_thumb_width}px`,
                                            height: `${settings.single_gallery_thumb_height}px`,
                                            borderColor: settings.single_gallery_border_color
                                        }}
                                        onMouseEnter={(e)=>e.target.style.borderColor = settings.single_gallery_hover_border}
                                        onMouseLeave={(e)=>e.target.style.borderColor = settings.single_gallery_border_color}
                                    />

                                ))}

                            </div>

                        )}

                    </div>


                    {/* INFO */}

                    <div>

                        <h1
                            className="font-bold mb-4"
                            style={{
                                fontSize: `${settings.single_title_font_size}px`,
                                color: settings.single_title_color
                            }}
                        >
                            {product.title}
                        </h1>

                        {product.description && (

                            <p
                                className="mb-6 leading-relaxed"
                                style={{
                                    color: settings.single_description_color,
                                    fontSize: `${settings.single_description_font_size}px`
                                }}
                            >
                                {product.description}
                            </p>

                        )}

                        {product.features?.length > 0 && (

                            <ul className="space-y-2">

                                {product.features.map((f,i)=>(

                                    <li key={i} className="flex gap-2 items-start">

<span style={{color: settings.single_feature_icon_color}}>
✓
</span>

                                        <span
                                            className="break-words"
                                            style={{
                                                fontSize: `${settings.single_feature_font_size}px`
                                            }}
                                        >
                                            {f.filter} {f.value}
                                        </span>

                                    </li>

                                ))}

                            </ul>

                        )}

                    </div>

                </div>

            </div>

        </MainLayout>

    )

}
