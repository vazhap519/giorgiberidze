// export default function SectionTitle({ title }) {
//     return (
//         <div className="mb-14 text-center lg:text-left">

//             <h2 className="
//                 text-4xl
//                 md:text-5xl
//                 lg:text-6xl
//                 font-extrabold
//                 text-gray-900
//                 tracking-tight
//                 inline-block
//             ">
//                 {title}

//                 <span className="
//                     block
//                     w-full
//                     h-[3px]
//                     bg-blue-600
//                        mt-6
//                     rounded
//                 " />
//             </h2>

//         </div>
//     )
// }
export default function SectionTitle({ title, subtitle }) {

    return (

        <div className="mb-16 text-center lg:text-left">

            {/* SMALL LABEL */}
            {subtitle && (
                <p className="
                    text-sm
                    font-semibold
                    text-blue-600
                    uppercase
                    tracking-widest
                    mb-3
                ">
                    {subtitle}
                </p>
            )}

            {/* TITLE */}
            <h2 className="
                text-3xl
                md:text-4xl
                lg:text-5xl
                font-bold
                text-gray-900
                leading-tight
            ">
                {title}
            </h2>

            {/* DECORATION */}
            <div className="
                mt-5
                w-20
                h-[4px]
                bg-gradient-to-r
                from-blue-600
                to-blue-400
                rounded-full
                mx-auto
                lg:mx-0
            " />

        </div>

    )
}