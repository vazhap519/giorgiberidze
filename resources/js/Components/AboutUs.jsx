//
//
//
// import PersonGallery from "./PersonGallery.jsx"
// export default function AboutUs({ about }) {
//
//     if (!about) return null
//
//     const people = about.people || []
//
//     return (
//
//         <div className="max-w-7xl mx-auto px-6">
//
//             {/* TITLE */}
//
//             <div className="text-center mb-20">
//
//                 <h2 className="text-4xl font-bold">
//                     {about.title}
//                 </h2>
//
//                 <p className="mt-6 max-w-2xl mx-auto text-gray-500">
//                     {about.description}
//                 </p>
//
//             </div>
//
//
//             {/* PEOPLE GRID */}
//
//             <div className="grid md:grid-cols-2 gap-20">
//
//                 {people.map((person) => (
//                     <PersonGallery
//                         key={person.id}
//                         person={person}
//                     />
//                 ))}
//
//             </div>
//
//         </div>
//     )
// }
import PersonGallery from "./PersonGallery"

export default function AboutUs({ about }) {

    if (!about) return null

    const people = about.people || []

    return (

        <div className="w-full px-4 md:max-w-7xl md:mx-auto">

            {/* TITLE */}

            <div className="text-center mb-14 md:mb-20">

                <h2 className="text-3xl md:text-4xl font-bold">
                    {about.title}
                </h2>

                <p className="mt-4 md:mt-6 max-w-2xl mx-auto text-gray-500 text-sm md:text-base">
                    {about.description}
                </p>

            </div>


            {/* PEOPLE GRID */}

            <div className="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16">

                {people.map((person) => (

                    <PersonGallery
                        key={person.id}
                        person={person}
                    />

                ))}

            </div>

        </div>
    )
}
