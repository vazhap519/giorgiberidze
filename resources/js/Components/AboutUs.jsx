

import { motion } from "framer-motion";

export default function AboutUs({ about }) {

    if (!about) return null;
console.log(about)
    /*
    |--------------------------------------------------------------------------
    | Section Styles (Filament)
    |--------------------------------------------------------------------------
    */

    const sectionStyle = {
        background: about.bg_color || "#ffffff",
        opacity: about.opacity ?? 1,
        paddingTop: `${about.padding_top || 120}px`,
        paddingBottom: `${about.padding_bottom || 120}px`,
        backdropFilter: `blur(${about.blur || 0}px)`
    };

    const titleStyle = {
        color: about.title_color || "#111827",
        fontSize: `${about.title_size || 48}px`
    };

    const descriptionStyle = {
        color: about.description_color || "#4b5563",
        fontSize: `${about.description_size || 18}px`
    };

    const experienceBox = {
        background: about.experience_bg || "#ffffff"
    };

    const experienceText = {
        color: about.experience_text_color || "#2563eb"
    };

    return (

        <section style={sectionStyle}>

            <div className="max-w-7xl mx-auto px-6">

                {/* Title */}
                <motion.div
                    initial={{ opacity: 0, y: 40 }}
                    whileInView={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.6 }}
                    className="text-center mb-20"
                >

                    <h2
                        style={titleStyle}
                        className="font-bold"
                    >
                        {about.title}
                    </h2>

                    <p
                        style={descriptionStyle}
                        className="mt-6 max-w-2xl mx-auto"
                    >
                        {about.description}
                    </p>

                </motion.div>


                <div className="grid md:grid-cols-2 gap-16 items-center">

                    {/* Image */}
                    <motion.div
                        initial={{ opacity: 0, x: -60 }}
                        whileInView={{ opacity: 1, x: 0 }}
                        transition={{ duration: 0.7 }}
                        className="relative"
                    >

                        <img
                            src={about.image_url}
                            className="rounded-3xl shadow-2xl"
                        />

                        <div
                            style={experienceBox}
                            className="absolute -bottom-8 -right-8 backdrop-blur-lg border border-gray-200 shadow-xl rounded-2xl px-8 py-5"
                        >

                            <p
                                style={experienceText}
                                className="text-3xl font-bold"
                            >
                                {about.experience_years}
                            </p>

                            <p className="text-gray-600 text-sm">
                                {about.experience_label}
                            </p>

                        </div>

                    </motion.div>


                    {/* Feature Cards */}
                    <div className="grid sm:grid-cols-2 gap-6">

                        {about.features?.map((item, index) => {

                            const cardStyle = {
                                background: item.card_bg || about.card_bg || "#ffffff",
                                borderColor: item.card_border || about.card_border || "#e5e7eb",
                                borderRadius: `${item.card_radius || about.card_radius || 16}px`,
                                opacity: item.opacity ?? about.opacity ?? 1,
                                backdropFilter: `blur(${item.blur || about.blur || 0}px)`
                            };

                            const titleColor = item.title_color || about.title_color;
                            const descColor = item.description_color || about.description_color;

                            return (

                                <motion.div
                                    key={item.id}
                                    initial={{ opacity: 0, y: 40 }}
                                    whileInView={{ opacity: 1, y: 0 }}
                                    transition={{ delay: index * 0.15 }}
                                    whileHover={{ y: -6 }}
                                    style={cardStyle}
                                    className="group p-7 border shadow-sm hover:shadow-xl transition"
                                >

                                    <h4
                                        style={{ color: titleColor }}
                                        className="font-semibold text-lg mb-2 transition"
                                    >
                                        {item.title}
                                    </h4>

                                    <p
                                        style={{ color: descColor }}
                                        className="text-sm leading-relaxed"
                                    >
                                        {item.description}
                                    </p>

                                </motion.div>

                            );

                        })}

                    </div>

                </div>

            </div>

        </section>

    );
}
