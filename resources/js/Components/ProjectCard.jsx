// import { Link } from "@inertiajs/react"
// import { route } from "ziggy-js"

// export default function ProjectCard({ project }) {

//     return (

//         <Link href={route('projects.show', project.id)}>

//             <div className="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 cursor-pointer">

//                 <div className="h-56 overflow-hidden">

//                     <img
//                         src={project.cover_image || "/images/placeholder.jpg"}
//                         alt={project.title}
//                         className="w-full h-full object-cover hover:scale-105 transition duration-500"
//                     />

//                 </div>

//                 <div className="p-6">

//                     <h3 className="text-xl font-semibold text-gray-800">
//                         {project.title}
//                     </h3>

//                     <p className="text-gray-500 mt-3 text-sm leading-relaxed">
//                         {project.description
//                             ? project.description.slice(0, 100) + (project.description.length > 100 ? "..." : "")
//                             : ""}
//                     </p>

//                     <div className="mt-6 flex justify-end">

//                         <span className="text-[#1E6BB8] font-medium hover:underline">
//                             დეტალურად
//                         </span>

//                     </div>

//                 </div>

//             </div>

//         </Link>

//     );
// }
import { Link } from "@inertiajs/react"
import { route } from "ziggy-js"

export default function ProjectCard({ project }) {

    return (

        <Link href={route('projects.show', project.id)}>

            <div className="
                group
                relative
                bg-white
                rounded-2xl
                overflow-hidden
                shadow-lg
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
                        alt={project.title}
                        className="
                        w-full
                        h-full
                        object-cover
                        transition
                        duration-700
                        group-hover:scale-110
                        "
                    />

                    {/* OVERLAY */}
                    <div className="
                        absolute
                        inset-0
                        bg-gradient-to-t
                        from-black/70
                        via-black/20
                        to-transparent
                        opacity-0
                        group-hover:opacity-100
                        transition
                        duration-500
                    " />

                </div>

                {/* CONTENT */}
                <div className="p-6">

                    <h3 className="
                        text-lg
                        font-semibold
                        text-gray-800
                        group-hover:text-blue-600
                        transition
                    ">
                        {project.title}
                    </h3>

                    <p className="
                        text-gray-500
                        mt-3
                        text-sm
                        leading-relaxed
                    ">
                        {project.description
                            ? project.description.slice(0, 110) + (project.description.length > 110 ? "..." : "")
                            : ""}
                    </p>

                    {/* CTA */}
                    <div className="mt-6 flex items-center justify-between">

                        <span className="text-sm text-gray-400">
                            პროექტი
                        </span>

                        <span className="
                            text-blue-600
                            font-medium
                            flex items-center
                            gap-1
                            group-hover:gap-2
                            transition-all
                        ">

                            დეტალურად →

                        </span>

                    </div>

                </div>

            </div>

        </Link>

    );
}