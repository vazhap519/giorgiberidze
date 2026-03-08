import { usePage } from "@inertiajs/react"
import {
    Facebook,
    Instagram,
    Linkedin,
    Twitter,
    Youtube,
    Phone,
    Mail,
    MapPin
} from "lucide-react"

export default function Footer() {

    const { siteSettings, contact } = usePage().props

    const socialIcons = {
        facebook: Facebook,
        instagram: Instagram,
        linkedin: Linkedin,
        twitter: Twitter,
        youtube: Youtube
    }

    return (

        <footer className="bg-slate-900 text-gray-300 pt-20 pb-10">

            <div className="max-w-7xl mx-auto px-6">

                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

                    {/* LOGO + ABOUT */}

                    <div className="space-y-6">

                        {siteSettings?.logo_url && (

                            <img
                                src={siteSettings.logo_url}
                                alt="logo"
                                className="h-12"
                            />

                        )}

                        <p className="text-gray-400 text-sm leading-relaxed">
                            {siteSettings?.footer_description}
                        </p>

                    </div>


                    {/* NAVIGATION */}

                    <div>

                        <h4 className="text-white font-semibold mb-6">
                            {siteSettings?.footer_navigation_title}
                        </h4>

                        <ul className="space-y-3 text-sm">

                            <li>
                                <a href="#services" className="hover:text-white transition">
                                    სერვისები
                                </a>
                            </li>

                            <li>
                                <a href="#products" className="hover:text-white transition">
                                    პროდუქტები
                                </a>
                            </li>

                            <li>
                                <a href="#projects" className="hover:text-white transition">
                                    პროექტები
                                </a>
                            </li>

                            <li>
                                <a href="#contact" className="hover:text-white transition">
                                    კონტაქტი
                                </a>
                            </li>

                        </ul>

                    </div>


                    {/* CONTACT INFO */}

                    <div>

                        <h4 className="text-white font-semibold mb-6">
                            {siteSettings?.footer_contact_title}
                        </h4>

                        <div className="space-y-4 text-sm">

                            {contact?.contact_items?.map((item, index) => {

                                let Icon

                                if (item.type === "phone") Icon = Phone
                                if (item.type === "email") Icon = Mail
                                if (item.type === "address") Icon = MapPin

                                return (

                                    <div key={index} className="flex items-start gap-3">

                                        {Icon && (
                                            <Icon className="w-4 h-4 text-blue-500 mt-[2px]" />
                                        )}

                                        <span className="text-gray-400">
                                            {item.value}
                                        </span>

                                    </div>

                                )

                            })}

                        </div>

                    </div>


                    {/* SOCIAL LINKS */}

                    <div>

                        <h4 className="text-white font-semibold mb-6">
                            {siteSettings?.footer_social_title}
                        </h4>

                        <div className="flex gap-4">

                            {contact?.social_links?.map((social, index) => {

                                const Icon = socialIcons[social.platform]

                                if (!Icon) return null

                                return (

                                    <a
                                        key={index}
                                        href={social.url}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        className="
                                            flex
                                            items-center
                                            justify-center
                                            w-10
                                            h-10
                                            rounded-lg
                                            bg-slate-800
                                            hover:bg-blue-600
                                            transition
                                        "
                                    >

                                        <Icon className="w-5 h-5 text-gray-300" />

                                    </a>

                                )

                            })}

                        </div>

                    </div>

                </div>


                {/* DIVIDER */}

                <div className="
                    border-t
                    border-slate-700
                    mt-16
                    pt-8
                    text-center
                    text-sm
                    text-gray-400
                ">

                    {siteSettings?.footer_copyright
                        ? siteSettings.footer_copyright
                        : `© ${new Date().getFullYear()} ${siteSettings?.site_name}. ყველა უფლება დაცულია.`}

                </div>

            </div>

        </footer>

    )
}