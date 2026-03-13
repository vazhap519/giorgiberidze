// import { usePage } from "@inertiajs/react"
// import SeoHead from "@/Components/SeoHead"
// import Header from "@/Components/Header"
// import Footer from "@/Components/Footer"
//
// export default function MainLayout({ children, fullWidth = false }) {
//
//     const { seo, siteSettings } = usePage().props
//
//
//     /* -------------------------
//     Global Styles from CMS
//     ------------------------- */
//
//     const styles = {
//
//         site: {
//             background: siteSettings?.site_bg_color || "#ffffff",
//             color: siteSettings?.site_text_color || "#111827",
//
//         },
//
//         container: {
//             minWidth: `${siteSettings?.site_container_width || 1200}px`
//         }
//
//     }
//
//
//     return (
//
//         // <>
//         //     <SeoHead seo={seo} />
//         //
//         //     <div
//         //         style={styles.site}
//         //         className="flex flex-col min-h-screen"
//         //     >
//         //
//         //         <Header siteSettings={siteSettings} />
//         //
//         //         <main className="flex-1">
//         //
//         //             <div
//         //                 style={styles.container}
//         //                 className="mx-auto w-full px-4 md:px-6 lg:px-8"
//         //             >
//         //                 {children}
//         //             </div>
//         //
//         //         </main>
//         //
//         //         <Footer />
//         //
//         //     </div>
//         //
//         // </>
//         <>
//             <SeoHead seo={seo} />
//
//             <div
//                 style={styles.site}
//                 className="flex flex-col min-h-screen"
//             >
//
//                 <Header siteSettings={siteSettings} />
//
//                 <main className="flex-1">
//
//                     {fullWidth ? (
//
//                         /* FULL WIDTH PAGE */
//
//                         children
//
//                     ) : (
//
//                         /* NORMAL PAGE */
//
//                         <div
//                             style={styles.container}
//                             className="mx-auto w-full px-4 md:px-6"
//                         >
//                             {children}
//                         </div>
//
//                     )}
//
//                 </main>
//
//                 <Footer />
//
//             </div>
//
//         </>
//
//     )
//
// }
import { usePage } from "@inertiajs/react"
import SeoHead from "@/Components/SeoHead"
import Header from "@/Components/Header"
import Footer from "@/Components/Footer"

export default function MainLayout({ children, fullWidth = false }) {

    const { seo, siteSettings } = usePage().props

    const styles = {

        site: {
            background: siteSettings?.site_bg_color || "#ffffff",
            color: siteSettings?.site_text_color || "#111827",
        },

        container: {
            maxWidth: `${siteSettings?.site_container_width || 1200}px`
        }

    }

    return (

        <>
            <SeoHead seo={seo} />

            <div
                style={styles.site}
                className="flex flex-col min-h-screen"
            >

                <Header siteSettings={siteSettings} />

                <main className="flex-1">

                    {fullWidth ? (

                        children

                    ) : (

                        <div
                            style={styles.container}
                            className="mx-auto w-full px-4 md:px-6 lg:px-8"
                        >
                            {children}
                        </div>

                    )}

                </main>

                <Footer />

            </div>

        </>

    )

}
