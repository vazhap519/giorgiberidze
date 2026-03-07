import {
    Mail,
    Phone,
    MapPin,
    Facebook,
    Instagram,
    Linkedin,
    Twitter,
    Youtube
} from "lucide-react"

import {
    FaTiktok,
    FaPinterest,
    FaTelegram,
    FaWhatsapp
} from "react-icons/fa"

export default function LeftContactInfo({ siteSettings, contact }) {

    const iconMap = {
        phone: Phone,
        email: Mail,
        address: MapPin,

        facebook: Facebook,
        instagram: Instagram,
        linkedin: Linkedin,
        twitter: Twitter,
        youtube: Youtube,

        tiktok: FaTiktok,
        pinterest: FaPinterest,
        telegram: FaTelegram,
        whatsapp: FaWhatsapp
    }

    return (

        <div className="space-y-8">

            <h3 className="text-2xl font-semibold text-gray-900">
                {siteSettings?.contact_left_title}
            </h3>

            <p className="text-gray-600 leading-relaxed max-w-md">
                {contact?.description}
            </p>

            <div className="space-y-5 pt-4">

                {contact?.contact_items?.map((item, index) => {

                    const Icon = iconMap[item.type]

                    return (
                        <div key={index} className="flex items-center gap-4">

                            {Icon && (
                                <Icon className="text-blue-600 w-5 h-5" />
                            )}

                            <span className="text-gray-700">
                                {item.value}
                            </span>

                        </div>
                    )
                })}

            </div>

            {/* SOCIAL LINKS */}

            <div className="flex gap-4 pt-6 flex-wrap">

                {contact?.social_links?.map((social, index) => {

                    const Icon = iconMap[social.platform]

                    if (!Icon) return null

                    return (
                        <a
                            key={index}
                            href={social.url}
                            target="_blank"
                            rel="noopener noreferrer"
                            className="p-3 bg-white rounded-xl shadow hover:shadow-lg transition"
                        >
                            <Icon className="text-blue-600 w-5 h-5" />
                        </a>
                    )
                })}

            </div>

        </div>
    )
}
