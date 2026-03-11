import { Link } from "@inertiajs/react"
import { route } from "ziggy-js"

export default function ProjectCard({ project }) {

    const cardStyle = {
        background: project.card_bg,
        border: `1px solid ${project.card_border}`,
        borderRadius: `${project.card_radius}px`
    }

    const titleStyle = {
        color: project.title_color,
        fontSize: `${project.title_size}px`,
        fontWeight: project.title_weight
    }

    const descriptionStyle = {
        color: project.description_color,
        fontSize: `${project.description_size}px`
    }

    return (

        <Link href={route('projects.show', project.slug)}>

            <div
                style={cardStyle}
                className="
                group
                relative
                overflow-hidden
                transition
                duration-500
                hover:-translate-y-2
                hover:shadow-2xl
                cursor-pointer
            ">

                {/* IMAGE */}

                <div className="relative h-60 overflow-hidden">

                    <img
                        src={project.cover_image || "/images/placeholder.jpg"}
                        className="
                        w-full
                        h-full
                        object-cover
                        transition
                        duration-700
                        group-hover:scale-110
                        "
                    />

                    <div
                        style={{
                            background: `linear-gradient(to top,
                                ${project.overlay_bg_from},
                                ${project.overlay_bg_via},
                                ${project.overlay_bg_to})`
                        }}
                        className="
                        absolute inset-0
                        opacity-0
                        group-hover:opacity-100
                        transition
                        duration-500
                        "
                    />

                </div>


                {/* CONTENT */}

                <div className="p-6">

                    <h3 style={titleStyle}>
                        {project.title}
                    </h3>

                    <p
                        style={descriptionStyle}
                        className="mt-3 leading-relaxed"
                    >
                        {project.description
                            ? project.description.slice(0, 110) + "..."
                            : ""}
                    </p>


                    {/* CTA */}

                    <div className="mt-6 flex items-center justify-between">

                        <span className="text-sm text-gray-400">
                            {project.project_label}
                        </span>

                        <span
                            style={{ color: project.title_color }}
                            className="
                            font-medium
                            flex items-center
                            gap-1
                            group-hover:gap-2
                            transition-all
                            "
                        >
                            {project.cta_text} →
                        </span>

                    </div>

                </div>

            </div>

        </Link>

    )
}
