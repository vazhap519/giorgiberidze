// //
// // import { router, Link } from "@inertiajs/react"
// // import { useState } from "react"
// // import Header from "@/Components/Header.jsx";
// // import Footer from "@/Components/Footer.jsx";
// //
// // export default function ProductPage({
// //                                         products,
// //                                         filters,
// //                                         siteSettings,
// //                                         activeFilters = {},
// //                                         search: initialSearch,
// //                                         si
// //                                     }) {
// //
// // const [search, setSearch] = useState(initialSearch ?? "")
// // const [selectedFilters, setSelectedFilters] = useState(activeFilters ?? {})
// //
// // /* ---------------- FILTER TOGGLE ---------------- */
// //
// // const toggleFilter = (slug, value) => {
// //
// //     let newFilters = { ...selectedFilters }
// //
// //     if (!newFilters[slug]) {
// //         newFilters[slug] = []
// //     }
// //
// //     if (newFilters[slug].includes(value)) {
// //
// //         newFilters[slug] = newFilters[slug].filter(v => v !== value)
// //
// //         if (newFilters[slug].length === 0) {
// //             delete newFilters[slug]
// //         }
// //
// //     } else {
// //
// //         newFilters[slug].push(value)
// //
// //     }
// //
// //     setSelectedFilters(newFilters)
// //
// //     router.get("/products", {
// //         filters: newFilters,
// //         search
// //     }, {
// //         preserveState: true,
// //         replace: true
// //     })
// // }
// //
// //
// // /* ---------------- SEARCH ---------------- */
// //
// // const submitSearch = (e) => {
// //
// //     e.preventDefault()
// //
// //     router.get("/products", {
// //         search,
// //         filters: selectedFilters
// //     }, {
// //         preserveState: true,
// //         replace: true
// //     })
// // }
// //
// //
// // /* ---------------- CLEAR FILTERS ---------------- */
// //
// // const clearFilters = () => {
// //
// //     setSearch("")
// //     setSelectedFilters({})
// //
// //     router.get("/products")
// //
// // }
// // console.log()
// //
// // /* ---------------- PRODUCT CARD ---------------- */
// //
// // const ProductCard = ({ product }) => (
// // <>
// // {/*<Header siteSettings={siteSettings}/>*/}
// //
// //     <div
// //         onClick={() => router.visit(`/products/${product.slug}`)}
// //         className="
// //         bg-white
// //         border
// //         border-gray-200
// //         rounded-xl
// //         p-6
// //         shadow-sm
// //         hover:shadow-md
// //         transition
// //         text-center
// //         cursor-pointer
// //     "
// //     >
// //
// //         <img
// //             src={product.image_url || "/images/no-image.png"}
// //             alt={product.title}
// //             className="w-full h-[180px] object-contain mb-4"
// //         />
// //
// //         <h3 className="text-sm font-medium text-gray-800">
// //             {product.title}
// //         </h3>
// //
// //     </div>
// //
// // )
// //
// //
// // return (
// //
// //     <div className="max-w-[1350px] mx-auto px-6 py-16">
// //
// //         {/* HEADER */}
// //
// //         <div className="mb-12">
// //
// //             <h1
// //                 style={{ color: settings?.dark_color }}
// //                 className="text-3xl font-semibold mb-3"
// //             >
// //                 {settings?.products_page_title ?? "პროდუქტები"}
// //             </h1>
// //
// //             <div
// //                 style={{ background: settings?.accent_color }}
// //                 className="h-[3px] w-[120px]"
// //             />
// //
// //         </div>
// //
// //
// //         <div className="grid lg:grid-cols-[270px_1fr] gap-12 items-start">
// //
// //
// //             {/* FILTER SIDEBAR */}
// //
// //             <aside className="sticky top-24">
// //
// //                 <div className="bg-white border border-gray-200 rounded-xl shadow-sm">
// //
// //                     <div className="p-5 border-b">
// //
// //                         <h3
// //                             style={{ color: settings?.accent_color }}
// //                             className="font-semibold text-lg"
// //                         >
// //                             {settings?.filter_title ?? "ფილტრი"}
// //                         </h3>
// //
// //                         <button style={{ color: settings?.dark_color }}
// //                             onClick={clearFilters}
// //                             className="text-sm text-red-500 mt-2 hover:underline"
// //                         >
// //                             {settings?.clear_filters_text ?? "გაასუფთავე ფილტრი"}
// //                         </button>
// //
// //                     </div>
// //
// //
// //                     <div className="p-5 space-y-6">
// //
// //                         {filters.map(filter => (
// //
// //                             <details key={filter.id} className="border-b pb-4">
// //
// //                                 <summary className="cursor-pointer font-semibold text-sm mb-3 text-gray-800 break-all">
// //                                     {filter.name}
// //                                 </summary>
// //
// //                                 <div className="space-y-2 break-all">
// //
// //                                     {filter.values?.map(value => {
// //
// //                                         const checked =
// //                                             selectedFilters?.[filter.slug]?.includes(value) ?? false
// //
// //                                         return (
// //
// //                                             <label
// //                                                 key={value}
// //                                                 className="
// //                                                 flex items-center gap-2
// //                                                 text-sm
// //                                                 cursor-pointer
// //                                                 px-2 py-1
// //                                                 rounded
// //                                                 hover:bg-gray-50
// //                                                 transition
// //                                             "
// //                                             >
// //
// //                                                 <input
// //                                                     type="checkbox"
// //                                                     checked={checked}
// //                                                     onChange={() => toggleFilter(filter.slug, value)}
// //                                                     className="w-4 h-4 accent-gray-900"
// //                                                 />
// //
// //                                                 <span className="text-gray-700 break-all">
// //                                                     {value}
// //                                                 </span>
// //
// //                                             </label>
// //
// //                                         )
// //
// //                                     })}
// //
// //                                 </div>
// //
// //                             </details>
// //
// //                         ))}
// //
// //                     </div>
// //
// //                 </div>
// //
// //             </aside>
// //
// //
// //
// //             {/* PRODUCTS */}
// //
// //             <main>
// //
// //                 {/* SEARCH */}
// //
// //                 <form onSubmit={submitSearch} className="flex justify-end mb-10">
// //
// //                     <input
// //                         type="text"
// //                         placeholder="Search"
// //                         value={search}
// //                         onChange={(e) => setSearch(e.target.value)}
// //                         className="
// //                         border
// //                         border-gray-300
// //                         rounded-full
// //                         px-5
// //                         py-2
// //                         w-[240px]
// //                         text-sm
// //                         focus:outline-none
// //                         focus:ring-2
// //                         focus:ring-gray-300
// //                     "
// //                     />
// //
// //                 </form>
// //
// //
// //                 {/* GRID */}
// //
// //                 <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
// //
// //                     {products.data.map(product => (
// //
// //                         <ProductCard
// //                             key={product.id}
// //                             product={product}
// //                         />
// //
// //                     ))}
// //
// //                 </div>
// //
// //
// //                 {/* PAGINATION */}
// //
// //                 <div className="flex justify-center mt-16 gap-2 flex-wrap">
// //
// //                     {products.links.map((link, index) => {
// //
// //                         const label = link.label
// //                             .replace("pagination.previous", "წინა")
// //                             .replace("pagination.next", "შემდეგი")
// //
// //                         if (!link.url) {
// //
// //                             return (
// //                                 <span
// //                                     key={index}
// //                                     className="px-3 py-2 text-gray-400 text-sm"
// //                                 >
// //                                     {label}
// //                                 </span>
// //                             )
// //
// //                         }
// //
// //                         return (
// //
// //                             <Link
// //                                 key={index}
// //                                 href={link.url}
// //                                 preserveState
// //                                 className={`
// //     px-3 py-2
// //     text-sm
// //     rounded
// //     border
// //     ${link.active
// //         ? "bg-gray-900 text-white border-gray-900"
// //         : "hover:bg-gray-100"
// //     }
// //     `}
// //                             >
// //
// //                                 {label}
// //
// //                             </Link>
// //
// //                         )
// //
// //                     })}
// //
// //                 </div>
// //
// //             </main>
// //
// //         </div>
// //
// //     </div>
// //     <Footer />
// // </>
// // )
// //
// //
// // }
// import { router, Link } from "@inertiajs/react"
// import { useState } from "react"
// import Header from "@/Components/Header.jsx"
// import Footer from "@/Components/Footer.jsx"
//
// export default function ProductPage({
//                                         products,
//                                         filters,
//                                         siteSettings,
//                                         activeFilters = {},
//                                         search: initialSearch
//                                     }) {
//
//     const [search, setSearch] = useState(initialSearch ?? "")
//     const [selectedFilters, setSelectedFilters] = useState(activeFilters ?? {})
//
//     /* ---------------- FILTER TOGGLE ---------------- */
//
//     const toggleFilter = (slug, value) => {
//
//         let newFilters = { ...selectedFilters }
//
//         if (!newFilters[slug]) {
//             newFilters[slug] = []
//         }
//
//         if (newFilters[slug].includes(value)) {
//
//             newFilters[slug] = newFilters[slug].filter(v => v !== value)
//
//             if (newFilters[slug].length === 0) {
//                 delete newFilters[slug]
//             }
//
//         } else {
//
//             newFilters[slug].push(value)
//
//         }
//
//         setSelectedFilters(newFilters)
//
//         router.get("/products", {
//             filters: newFilters,
//             search
//         }, {
//             preserveState: true,
//             replace: true
//         })
//     }
//
//     /* ---------------- SEARCH ---------------- */
//
//     const submitSearch = (e) => {
//
//         e.preventDefault()
//
//         router.get("/products", {
//             search,
//             filters: selectedFilters
//         }, {
//             preserveState: true,
//             replace: true
//         })
//     }
//
//     /* ---------------- CLEAR FILTERS ---------------- */
//
//     const clearFilters = () => {
//
//         setSearch("")
//         setSelectedFilters({})
//
//         router.get("/products")
//     }
//
//     /* ---------------- PRODUCT CARD ---------------- */
//
//     const ProductCard = ({ product }) => (
//
//         <div
//             onClick={() => router.visit(`/products/${product.slug}`)}
//             className="
//     bg-white
//     border
//     border-gray-200
//     rounded-xl
//     p-6
//     shadow-sm
//     hover:shadow-md
//     transition
//     text-center
//     cursor-pointer
// "
//         >
//
//             <img
//                 src={product.image_url || "/images/no-image.png"}
//                 alt={product.title}
//                 className="w-full h-[180px] object-contain mb-4"
//             />
//
//             <h3 className="text-sm font-medium text-gray-800">
//                 {product.title}
//             </h3>
//
//         </div>
//
//     )
//
//     return (
//
//         <>
//
//             {/* HEADER */}
//
//             <Header siteSettings={siteSettings} />
//
//             <div className="max-w-[1350px] mx-auto px-6 py-16">
//
//                 {/* PAGE TITLE */}
//
//                 <div className="mb-12">
//
//                     <h1
//                         style={{ color: siteSettings?.dark_color }}
//                         className="text-3xl font-semibold mb-3"
//                     >
//                         {siteSettings?.products_page_title ?? "პროდუქტები"}
//                     </h1>
//
//                     <div
//                         style={{ background: siteSettings?.accent_color }}
//                         className="h-[3px] w-[120px]"
//                     />
//
//                 </div>
//
//                 <div className="grid lg:grid-cols-[270px_1fr] gap-12 items-start">
//
//                     {/* FILTER SIDEBAR */}
//
//                     <aside className="sticky top-24">
//
//                         <div className="bg-white border border-gray-200 rounded-xl shadow-sm">
//
//                             <div className="p-5 border-b">
//
//                                 <h3
//                                     style={{ color: siteSettings?.accent_color }}
//                                     className="font-semibold text-lg"
//                                 >
//                                     {siteSettings?.filter_title ?? "ფილტრი"}
//                                 </h3>
//
//                                 <button
//                                     style={{ color: siteSettings?.dark_color }}
//                                     onClick={clearFilters}
//                                     className="text-sm text-red-500 mt-2 hover:underline"
//                                 >
//                                     {siteSettings?.clear_filters_text ?? "გაასუფთავე ფილტრი"}
//                                 </button>
//
//                             </div>
//
//                             <div className="p-5 space-y-6">
//
//                                 {filters.map(filter => (
//
//                                     <details key={filter.id} className="border-b pb-4">
//
//                                         <summary className="cursor-pointer font-semibold text-sm mb-3 text-gray-800 break-all">
//                                             {filter.name}
//                                         </summary>
//
//                                         <div className="space-y-2 break-all">
//
//                                             {filter.values?.map(value => {
//
//                                                 const checked =
//                                                     selectedFilters?.[filter.slug]?.includes(value) ?? false
//
//                                                 return (
//
//                                                     <label
//                                                         key={value}
//                                                         className="
// flex items-center gap-2
// text-sm
// cursor-pointer
// px-2 py-1
// rounded
// hover:bg-gray-50
// transition
// "
//                                                     >
//
//                                                         <input
//                                                             type="checkbox"
//                                                             checked={checked}
//                                                             onChange={() => toggleFilter(filter.slug, value)}
//                                                             className="w-4 h-4 accent-gray-900"
//                                                         />
//
//                                                         <span className="text-gray-700 break-all">
// {value}
// </span>
//
//                                                     </label>
//
//                                                 )
//
//                                             })}
//
//                                         </div>
//
//                                     </details>
//
//                                 ))}
//
//                             </div>
//
//                         </div>
//
//                     </aside>
//
//                     {/* PRODUCTS */}
//
//                     <main>
//
//                         {/* SEARCH */}
//
//                         <form onSubmit={submitSearch} className="flex justify-end mb-10">
//
//                             <input
//                                 type="text"
//                                 placeholder="Search"
//                                 value={search}
//                                 onChange={(e) => setSearch(e.target.value)}
//                                 className="
// border
// border-gray-300
// rounded-full
// px-5
// py-2
// w-[240px]
// text-sm
// focus:outline-none
// focus:ring-2
// focus:ring-gray-300
// "
//                             />
//
//                         </form>
//
//                         {/* GRID */}
//
//                         <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
//
//                             {products.data.map(product => (
//
//                                 <ProductCard
//                                     key={product.id}
//                                     product={product}
//                                 />
//
//                             ))}
//
//                         </div>
//
//                         {/* PAGINATION */}
//
//                         <div className="flex justify-center mt-16 gap-2 flex-wrap">
//
//                             {products.links.map((link, index) => {
//
//                                 const label = link.label
//                                     .replace("pagination.previous", "წინა")
//                                     .replace("pagination.next", "შემდეგი")
//
//                                 if (!link.url) {
//
//                                     return (
//                                         <span
//                                             key={index}
//                                             className="px-3 py-2 text-gray-400 text-sm"
//                                         >
// {label}
// </span>
//                                     )
//
//                                 }
//
//                                 return (
//
//                                     <Link
//                                         key={index}
//                                         href={link.url}
//                                         preserveState
//                                         className={`
// px-3 py-2
// text-sm
// rounded
// border
// ${link.active
//                                             ? "bg-gray-900 text-white border-gray-900"
//                                             : "hover:bg-gray-100"
//                                         }
// `}
//                                     >
//
//                                         {label}
//
//                                     </Link>
//
//                                 )
//
//                             })}
//
//                         </div>
//
//                     </main>
//
//                 </div>
//
//             </div>
//
//             {/* FOOTER */}
//
//             <Footer />
//
//         </>
//
//     )
//
// }
import { router, Link } from "@inertiajs/react"
import { useState } from "react"
import MainLayout from "@/Layouts/MainLayout"

export default function ProductPage({
                                        products,
                                        filters,
                                        siteSettings,
                                        activeFilters = {},
                                        search: initialSearch
                                    }) {

    const [search, setSearch] = useState(initialSearch ?? "")
    const [selectedFilters, setSelectedFilters] = useState(activeFilters ?? {})

    /* ---------------- FILTER TOGGLE ---------------- */

    const toggleFilter = (slug, value) => {

        let newFilters = { ...selectedFilters }

        if (!newFilters[slug]) {
            newFilters[slug] = []
        }

        if (newFilters[slug].includes(value)) {

            newFilters[slug] = newFilters[slug].filter(v => v !== value)

            if (newFilters[slug].length === 0) {
                delete newFilters[slug]
            }

        } else {

            newFilters[slug].push(value)

        }

        setSelectedFilters(newFilters)

        router.get("/products", {
            filters: newFilters,
            search
        }, {
            preserveState: true,
            replace: true
        })

    }

    /* ---------------- SEARCH ---------------- */

    const submitSearch = (e) => {

        e.preventDefault()

        router.get("/products", {
            search,
            filters: selectedFilters
        }, {
            preserveState: true,
            replace: true
        })

    }

    /* ---------------- CLEAR FILTERS ---------------- */

    const clearFilters = () => {

        setSearch("")
        setSelectedFilters({})

        router.get("/products")

    }

    /* ---------------- PRODUCT CARD ---------------- */

    const ProductCard = ({ product }) => (

        <div
            onClick={() => router.visit(`/products/${product.slug}`)}
            className="
bg-white
border
border-gray-200
rounded-xl
p-6
shadow-sm
hover:shadow-md
transition
text-center
cursor-pointer
"
        >

            <img
                src={product.image_url || "/images/no-image.png"}
                alt={product.title}
                className="w-full h-[180px] object-contain mb-4"
            />

            <h3 className="text-sm font-medium text-gray-800">
                {product.title}
            </h3>

        </div>

    )

    return (

        <MainLayout>

            <div className="max-w-[1350px] mx-auto px-6 py-16">

                {/* PAGE TITLE */}

                <div className="mb-12">

                    <h1
                        style={{ color: siteSettings?.dark_color }}
                        className="text-3xl font-semibold mb-3"
                    >
                        {siteSettings?.products_page_title ?? "პროდუქტები"}
                    </h1>

                    <div
                        style={{ background: siteSettings?.accent_color }}
                        className="h-[3px] w-[120px]"
                    />

                </div>

                <div className="grid lg:grid-cols-[270px_1fr] gap-12 items-start">

                    {/* FILTER SIDEBAR */}

                    <aside className="sticky top-24">

                        <div className="bg-white border border-gray-200 rounded-xl shadow-sm">

                            <div className="p-5 border-b">

                                <h3
                                    style={{ color: siteSettings?.accent_color }}
                                    className="font-semibold text-lg"
                                >
                                    {siteSettings?.filter_title ?? "ფილტრი"}
                                </h3>

                                <button
                                    style={{ color: siteSettings?.dark_color }}
                                    onClick={clearFilters}
                                    className="text-sm text-red-500 mt-2 hover:underline"
                                >
                                    {siteSettings?.clear_filters_text ?? "გაასუფთავე ფილტრი"}
                                </button>

                            </div>

                            <div className="p-5 space-y-6">

                                {filters.map(filter => (

                                    <details key={filter.id} className="border-b pb-4">

                                        <summary className="cursor-pointer font-semibold text-sm mb-3 text-gray-800 break-all">
                                            {filter.name}
                                        </summary>

                                        <div className="space-y-2 break-all">

                                            {filter.values?.map(value => {

                                                const checked =
                                                    selectedFilters?.[filter.slug]?.includes(value) ?? false

                                                return (

                                                    <label
                                                        key={value}
                                                        className="
flex items-center gap-2
text-sm
cursor-pointer
px-2 py-1
rounded
hover:bg-gray-50
transition
"
                                                    >

                                                        <input
                                                            type="checkbox"
                                                            checked={checked}
                                                            onChange={() => toggleFilter(filter.slug, value)}
                                                            className="w-4 h-4 accent-gray-900"
                                                        />

                                                        <span className="text-gray-700 break-all">
{value}
</span>

                                                    </label>

                                                )

                                            })}

                                        </div>

                                    </details>

                                ))}

                            </div>

                        </div>

                    </aside>

                    {/* PRODUCTS */}

                    <main>

                        {/* SEARCH */}

                        <form onSubmit={submitSearch} className="flex justify-end mb-10">

                            <input
                                type="text"
                                placeholder="Search"
                                value={search}
                                onChange={(e) => setSearch(e.target.value)}
                                className="
border
border-gray-300
rounded-full
px-5
py-2
w-[240px]
text-sm
focus:outline-none
focus:ring-2
focus:ring-gray-300
"
                            />

                        </form>

                        {/* GRID */}

                        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

                            {products.data.map(product => (

                                <ProductCard
                                    key={product.id}
                                    product={product}
                                />

                            ))}

                        </div>

                        {/* PAGINATION */}

                        <div className="flex justify-center mt-16 gap-2 flex-wrap">

                            {products.links.map((link, index) => {

                                const label = link.label
                                    .replace("pagination.previous", "წინა")
                                    .replace("pagination.next", "შემდეგი")

                                if (!link.url) {

                                    return (
                                        <span
                                            key={index}
                                            className="px-3 py-2 text-gray-400 text-sm"
                                        >
{label}
</span>
                                    )

                                }

                                return (

                                    <Link
                                        key={index}
                                        href={link.url}
                                        preserveState
                                        className={`
px-3 py-2
text-sm
rounded
border
${link.active
                                            ? "bg-gray-900 text-white border-gray-900"
                                            : "hover:bg-gray-100"
                                        }
`}
                                    >

                                        {label}

                                    </Link>

                                )

                            })}

                        </div>

                    </main>

                </div>

            </div>

        </MainLayout>

    )

}
