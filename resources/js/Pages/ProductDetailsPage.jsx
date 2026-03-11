import { useState } from "react"

export default function ProductShow({ product ,siteSettings }) {

    const [tab,setTab] = useState("overview")
    const [activeImage,setActiveImage] = useState(product.image_url)

    return (

        <div className="max-w-7xl mx-auto px-6 py-16">

            <div className="grid lg:grid-cols-2 gap-16">

                {/* IMAGE */}

                <div>

                    <img
                        src={activeImage || "/images/no-image.png"}
                        className="w-full rounded-xl object-contain"
                        alt={product.title}
                    />

                    {product.gallery?.length > 0 && (

                        <div className="flex gap-4 mt-6 flex-wrap">

                            {product.gallery.map((img,i)=>(

                                <img
                                    key={i}
                                    src={img.url}
                                    onClick={()=>setActiveImage(img.url)}
                                    className="
                                    w-20 h-20
                                    object-cover
                                    border
                                    rounded
                                    cursor-pointer
                                    hover:border-red-500
                                    transition
                                    "
                                    alt=""
                                />

                            ))}

                        </div>

                    )}

                </div>

                {/* INFO */}

                <div>

                    <h1 className="text-2xl font-bold mb-4">
                        {product.title}
                    </h1>

                    {product.description && (

                        <p className="text-gray-600 mb-6">
                            {product.description}
                        </p>

                    )}

                    {product.features?.length > 0 && (

                        <ul className="space-y-2">

                            {product.features.map((f,i)=>(

                                <li key={i} className="flex gap-2 items-start">

                                    <span className="text-green-500">✓</span>

                                    <span className="break-all">
                                        {f.filter} {f.value}
                                    </span>

                                </li>

                            ))}

                        </ul>

                    )}

                </div>

            </div>

            {/* TABS */}

            <div className="mt-16">

                <div className="flex gap-10 border-b pb-4">

                    <button
                        onClick={()=>setTab("overview")}
                        className={tab==="overview" ? "font-semibold border-b-2 border-black pb-2" : ""}
                    >
                        {siteSettings?.product_overview ?? "პროდუქტის განხილვა"}
                    </button>

                    <button
                        onClick={()=>setTab("features")}
                        className={tab==="features" ? "font-semibold border-b-2 border-black pb-2" : ""}
                    >
                        {siteSettings?.product_Features ?? "პროდუქტის მახასიათებლები"}
                    </button>

                    <button
                        onClick={()=>setTab("downloads")}
                        className={tab==="downloads" ? "font-semibold border-b-2 border-black pb-2" : ""}
                    >
                        {siteSettings?.Downloads_Features ?? 'გადმოწერა' }
                    </button>

                </div>

                {/* OVERVIEW */}

                {tab==="overview" && (

                    <div className="mt-10 text-gray-700 leading-relaxed">

                        {product.description}

                    </div>

                )}

                {/* FEATURES */}

                {tab==="features" && product.specs?.length > 0 && (

                    <div className="mt-10">

                        <table className="w-full border border-gray-200">

                            <tbody>

                            {product.specs.map((row,i)=>(

                                <tr key={i} className="border-b">

                                    <td className="p-3 font-semibold bg-gray-50 w-[40%]">
                                        {row.label}
                                    </td>

                                    <td className="p-3">
                                        {row.value}
                                    </td>

                                </tr>

                            ))}

                            </tbody>

                        </table>

                    </div>

                )}

                {/* DOWNLOADS */}

                {tab==="downloads" && product.downloads?.length > 0 && (

                    <div className="mt-10 space-y-4">

                        {product.downloads.map((file,i)=>(

                            <div
                                key={i}
                                className="
                                flex
                                justify-between
                                items-center
                                border
                                p-4
                                rounded
                                hover:bg-gray-50
                                transition
                                "
                            >

                                <span className="break-all">
                                    {file.name}
                                </span>
                                <a
                                    href={file.url}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    style={{
                                        background: product.download_btn_bg,
                                        color: product.download_btn_text,
                                        borderRadius: `${product.download_btn_radius}px`,
                                        fontSize: `${product.download_btn_size}px`
                                    }}
                                    className="
    px-4
    py-2
    transition
    "
                                    onMouseEnter={(e)=>e.target.style.background = product.download_btn_hover}
                                    onMouseLeave={(e)=>e.target.style.background = product.download_btn_bg}
                                >
                                    {siteSettings?.Downloads_Features ?? "გადმოწერა"}
                                </a>
                            </div>

                        ))}

                    </div>

                )}

            </div>

        </div>

    )

}
