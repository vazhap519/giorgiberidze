import { usePage } from "@inertiajs/react";
import SeoHead from "@/Components/SeoHead";
import Header from "@/Components/Header";

export default function ProjectDetails() {

    const { project, siteSettings,seo } = usePage().props;
console.log(project)
    return (

        <div className="bg-gray-50 min-h-screen">

            <SeoHead
                pageTitle={seo?.meta_title}
                description={seo?.meta_description}
                ogTitle={seo?.og_title}
                ogDescription={seo?.og_description}
                ogImage={seo?.og_image}
            />
            <Header siteSettings={siteSettings} />


            {/* TITLE */}
            <section className="max-w-6xl mx-auto px-6 py-16 text-center">

                <h1 className="text-4xl font-bold text-[#0B3C7A]">
                    {project.title}
                </h1>

                {/*<p className="mt-6 text-gray-600 max-w-3xl mx-auto">*/}
                {/*    {project.description}*/}
                {/*</p>*/}

            </section>


            {/* COVER IMAGE */}
            {project.cover_image && (

                <section className="max-w-6xl mx-auto px-6 pb-16">

                    <img
                        src={project.cover_image}
                        alt={project.title}
                        className="rounded-2xl shadow-lg w-full object-cover"
                    />

                </section>

            )}


            {/* VIDEOS */}
            {project.videos?.length > 0 && (

                <section className="max-w-5xl mx-auto py-20 px-6 space-y-10">

                    {project.videos.map((video, index) => (

                        <div key={index} className="aspect-video rounded-xl overflow-hidden shadow-xl">

                            <video
                                controls
                                className="w-full h-full object-cover"
                            >
                                <source src={video} type="video/mp4" />
                            </video>

                        </div>

                    ))}

                </section>

            )}


            {/* PROJECT OVERVIEW */}
            {project.description  && (

                <section className="max-w-6xl mx-auto px-6 py-20">

                    <div className="bg-white rounded-2xl shadow p-10">

                        <h2 className="text-2xl font-semibold text-[#0B3C7A]">
                            {project.project_overview_title}
                        </h2>

                        <p className="mt-6 text-gray-600 leading-relaxed">
                            {project.description}
                        </p>

                    </div>

                </section>

            )}


            {/* GALLERY */}
            {project.images?.length > 0 && (

                <section className="max-w-7xl mx-auto px-6 py-20">

                    <h2 className="text-center text-2xl font-semibold text-[#0B3C7A]">
                        {project.project_gallery_title}
                    </h2>

                    <div className="grid md:grid-cols-3 gap-8 mt-12">

                        {project.images.map((img, index) => (

                            <img
                                key={index}
                                src={img}
                                alt=""
                                className="rounded-xl shadow hover:scale-105 transition"
                            />

                        ))}

                    </div>

                </section>

            )}

        </div>

    );
}
