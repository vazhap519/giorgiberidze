import { usePage } from "@inertiajs/react"
import SeoHead from "@/Components/SeoHead"
import Header from "@/Components/Header"
import Footer from "@/Components/Footer"

export default function MainLayout({ children }) {

    const { seo, siteSettings } = usePage().props

    return (

        <>
            <SeoHead seo={seo} />

            <div className="flex flex-col min-h-screen">

                <Header siteSettings={siteSettings} />

                <main className="flex-1">
                    {children}
                </main>

                <Footer />

            </div>

        </>

    )

}
