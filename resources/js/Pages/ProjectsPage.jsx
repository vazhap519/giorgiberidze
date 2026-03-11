import { router, Link } from "@inertiajs/react"

export default function ProjectsPage({ projects, settings }) {

    const ProjectCard = ({ project }) => (

        <div
            onClick={() => router.visit(route('projects.show', project.slug))}
            className="
            bg-white
            border
            border-gray-200
            rounded-xl
            p-6
            shadow-sm
            hover:shadow-xl
            hover:-translate-y-1
            transition
            duration-300
            text-center
            cursor-pointer
        "
        >

            <img
                src={project.cover_image || "/images/no-image.png"}
                alt={project.title}
                className="w-full h-[180px] object-contain mb-4"
            />

            <h3 className="text-sm font-medium text-gray-800">
                {project.title}
            </h3>

        </div>

    )

    return (

        <div className="max-w-[1350px] mx-auto px-6 py-16">

            {/* HEADER */}

            <div className="mb-12">

                <h1
                    style={{ color: settings?.dark_color }}
                    className="text-3xl font-semibold mb-3"
                >
                    {settings?.projects_page_title ?? "პროექტები"}
                </h1>

                <div
                    style={{ background: settings?.accent_color }}
                    className="h-[3px] w-[120px]"
                />

            </div>


            {/* PROJECT GRID */}

            <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

                {projects?.data?.map(project => (

                    <ProjectCard
                        key={project.id}
                        project={project}
                    />

                ))}

            </div>


            {/* PAGINATION */}

            <div className="flex justify-center mt-16 gap-2 flex-wrap">

                {projects?.links?.map((link, index) => {

                    const label = link.label
                        .replace("&laquo;", "«")
                        .replace("&raquo;", "»")
                        .replace("pagination.previous", "წინა")
                        .replace("pagination.next", "შემდეგი")

                    if (!link.url) {

                        return (
                            <span
                                key={index}
                                className="px-3 py-2 text-gray-400 text-sm"
                                dangerouslySetInnerHTML={{ __html: label }}
                            />
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
                                transition
                                ${link.active
                                ? "bg-gray-900 text-white border-gray-900"
                                : "hover:bg-gray-100"
                            }
                            `}
                            dangerouslySetInnerHTML={{ __html: label }}
                        />

                    )

                })}

            </div>

        </div>

    )

}
