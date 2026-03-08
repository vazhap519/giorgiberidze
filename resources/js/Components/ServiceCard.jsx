// import { useState } from "react"

// export default function ServiceCard({ service }) {

//     const [open, setOpen] = useState(false)

//     return (
//         <div className="
//             bg-white
//             rounded-2xl
//             shadow-lg
//             overflow-hidden
//             transition-all
//             duration-300
//             w-full
//             max-w-sm
//         ">

//             {service.image_url && (
//                 <img
//                     src={service.image_url}
//                     alt={service.title}
//                     className="w-full h-48 object-contain p-4 bg-gray-50"
//                 />
//             )}

//             <div className="p-6 text-center">

//                 <h3 className="text-xl font-semibold text-gray-900">
//                     {service.title}
//                 </h3>

//                 <div
//                     className={`
//                         overflow-hidden
//                         transition-all
//                         duration-700
//                         ease-in-out
//                         ${open ? "max-h-[500px] opacity-100 mt-4" : "max-h-0 opacity-0"}
//                     `}
//                 >
//                     <p className="text-gray-600 leading-relaxed pb-6">
//                         {service.description}
//                     </p>
//                 </div>

//                 <button
//                     onClick={() => setOpen(!open)}
//                     className="
//                         mt-5
//                         px-6
//                         py-2
//                         border-2
//                         border-blue-600
//                         text-blue-600
//                         rounded-full
//                         hover:bg-blue-600
//                         hover:text-white
//                         transition
//                     "
//                 >
//                     {open ? "დახურვა" : "შეიტყვე მეტი"}
//                 </button>

//             </div>

//         </div>
//     )
// }
import { useState } from "react"

export default function ServiceCard({ service }) {

    const [open, setOpen] = useState(false)

    return (
        <div className="
            group
            bg-white
            rounded-2xl
            shadow-md
            hover:shadow-2xl
            transition
            duration-500
            w-full
            max-w-sm
            overflow-hidden
            hover:-translate-y-2
        ">

            {/* IMAGE */}
            {service.image_url && (
                <div className="bg-gray-50 flex items-center justify-center h-44 p-6">

                    <img
                        src={service.image_url}
                        alt={service.title}
                        className="
                        h-24
                        object-contain
                        transition-transform
                        duration-500
                        group-hover:scale-110
                        "
                    />

                </div>
            )}

            {/* CONTENT */}
            <div className="p-6 text-center">

                <h3 className="
                    text-lg
                    font-semibold
                    text-gray-900
                    group-hover:text-blue-600
                    transition
                ">
                    {service.title}
                </h3>

                {/* DESCRIPTION */}
                <div
                    className={`
                        overflow-hidden
                        transition-all
                        duration-500
                        ${open ? "max-h-[300px] opacity-100 mt-4" : "max-h-0 opacity-0"}
                    `}
                >
                    <p className="text-gray-600 text-sm leading-relaxed">
                        {service.description}
                    </p>
                </div>

                {/* BUTTON */}
                <button
                    onClick={() => setOpen(!open)}
                    className="
                        mt-6
                        inline-flex
                        items-center
                        gap-2
                        px-6
                        py-2.5
                        bg-blue-600
                        text-white
                        rounded-xl
                        text-sm
                        font-medium
                        hover:bg-blue-700
                        transition
                    "
                >
                    {open ? "დახურვა" : "შეიტყვე მეტი"}
                </button>

            </div>

        </div>
    )
}