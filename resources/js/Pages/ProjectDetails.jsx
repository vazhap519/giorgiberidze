import { usePage } from "@inertiajs/react";
import SeoHead from "@/Components/SeoHead";
import Header from "@/Components/Header";

import ProjectImageGallery from "@/Components/ProjectImageGallery";
import ProjectVideoGallery from "@/Components/ProjectVideoGallery";

export default function ProjectDetails() {

    const { project, siteSettings, seo } = usePage().props;

    /*
    |--------------------------------------------------------------------------
    | Dynamic Styles from CMS
    |--------------------------------------------------------------------------
    */

    const titleStyle = {
        color: project.title_color,
        fontSize: `${project.title_size}px`,
        fontWeight: project.title_weight
    };

    const descriptionStyle = {
        color: project.description_color,
        fontSize: `${project.description_size}px`
    };

    const cardStyle = {
        background: project.card_bg,
        border: `1px solid ${project.card_border}`,
        borderRadius: `${project.card_radius}px`
    };

    return (

        <div className="bg-slate-50 min-h-screen">

            <SeoHead
                pageTitle={seo?.meta_title}
                description={seo?.meta_description}
                ogTitle={seo?.og_title}
                ogDescription={seo?.og_description}
                ogImage={seo?.og_image}
            />

            <Header siteSettings={siteSettings} />

            {/* HERO */}

            <section className="relative w-full py-24 bg-gradient-to-b from-white to-slate-50">

                <div className="max-w-6xl mx-auto px-6 text-center">

                    <h1 style={titleStyle}>
                        {project.title}
                    </h1>

                </div>

            </section>


            {/* COVER IMAGE */}

            {project.cover_image && (

                <section className="max-w-6xl mx-auto px-6 pb-20">

                    <div className="relative overflow-hidden rounded-3xl shadow-2xl group">

                        <img
                            src={project.cover_image}
                            alt={project.title}
                            className="
                            w-full
                            h-[420px]
                            object-cover
                            transition
                            duration-700
                            group-hover:scale-105
                            "
                        />

                        <div className="
                        absolute
                        inset-0
                        bg-gradient-to-t
                        from-black/40
                        to-transparent
                        " />

                    </div>

                </section>

            )}


            {/* PROJECT OVERVIEW */}

            {project.description && (

                <section className="max-w-5xl mx-auto px-6 py-16">

                    <div
                        style={cardStyle}
                        className="shadow-lg p-10"
                    >

                        <h2
                            style={titleStyle}
                            className="mb-4"
                        >
                            {project.project_overview_title}
                        </h2>

                        <div className="w-16 h-[3px] bg-blue-600 rounded-full mb-6" />

                        <p
                            style={descriptionStyle}
                            className="leading-relaxed"
                        >
                            {project.description}
                        </p>

                    </div>

                </section>

            )}


            {/* VIDEO GALLERY */}

            {project.videos?.length > 0 && (

                <section className="max-w-6xl mx-auto px-6 py-20">

                    <h2
                        className="text-center mb-12"
                        style={titleStyle}
                    >
                        {project.video_section_title}
                    </h2>

                    <ProjectVideoGallery
                        videos={project.videos}
                    />

                </section>

            )}


            {/* IMAGE GALLERY */}

            {project.images?.length > 0 && (

                <section className="max-w-6xl mx-auto px-6 py-20">

                    <h2
                        className="text-center mb-12"
                        style={titleStyle}
                    >
                        {project.project_gallery_title}
                    </h2>

                    <ProjectImageGallery
                        images={project.images}
                    />

                </section>

            )}

        </div>
    );
}
