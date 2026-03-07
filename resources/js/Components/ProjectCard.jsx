import { Link } from "@inertiajs/react"
import { route } from "ziggy-js"

export default function ProjectCard({ project }) {

    return (

        <Link href={route('projects.show', project.id)}>

            <div className="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 cursor-pointer">

                <div className="h-56 overflow-hidden">

                    <img
                        src={project.cover_image || "/images/placeholder.jpg"}
                        alt={project.title}
                        className="w-full h-full object-cover hover:scale-105 transition duration-500"
                    />

                </div>

                <div className="p-6">

                    <h3 className="text-xl font-semibold text-gray-800">
                        {project.title}
                    </h3>

                    <p className="text-gray-500 mt-3 text-sm leading-relaxed">
                        {project.description
                            ? project.description.slice(0, 100) + (project.description.length > 100 ? "..." : "")
                            : ""}
                    </p>

                    <div className="mt-6 flex justify-end">

                        <span className="text-[#1E6BB8] font-medium hover:underline">
                            დეტალურად
                        </span>

                    </div>

                </div>

            </div>

        </Link>

    );
}
