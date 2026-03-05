// export default function ProductCard({ image = "/images/camera.jpg" }) {
//     return (
//         <div className="group relative w-[320px] h-[420px] rounded-2xl overflow-hidden bg-white shadow-xl transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl">
//
//             {/* IMAGE */}
//             <div className="flex items-center justify-center h-full p-8">
//                 <img
//                     src={image}
//                     alt="camera"
//                     className="object-contain h-full hero-float transition-transform duration-500 group-hover:scale-110"
//                 />
//             </div>
//
//             {/* RIGHT SLIDE OVERLAY */}
//             <div className="
//         absolute inset-y-0 right-0
//         w-full
//         bg-black/85
//         text-white
//         p-6
//         flex flex-col justify-center
//         transform translate-x-full
//         group-hover:translate-x-0
//         transition-transform duration-500
//       ">
//
//                 <h3 className="text-xl font-bold mb-4">
//                     უსაფრთხოების კამერა
//                 </h3>
//
//                 <ul className="space-y-2 text-sm leading-relaxed">
//                     <li>მაღალი ხარისხის გამოსახულება 4MP გაფართოებით</li>
//                     <li>24/7 ფერადი გამოსახულება</li>
//                     <li>დამოუკიდებელი მზის პანელით და ლითიუმ-ბატარეით</li>
//                     <li>LTE-TDD / LTE-FDD / WCDMA / GSM 4G</li>
//                     <li>microSD ბარათი — 256GB-მდე</li>
//                     <li>ინტელექტუალური ანალიტიკა</li>
//                     <li>წყლისა და მტვრის დაცვა (IP67)</li>
//                 </ul>
//
//             </div>
//
//         </div>
//     )
// }
export default function ProductCard({ product }) {
    return (
        <div className="group relative w-[320px] h-[420px] rounded-2xl overflow-hidden bg-white shadow-xl transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl">

            {/* IMAGE */}
            <div className="flex items-center justify-center h-full p-8">
                <img
                    src={product.image_url}
                    alt={product.title}
                    className="object-contain h-full hero-float transition-transform duration-500 group-hover:scale-110"
                />
            </div>

            {/* RIGHT SLIDE OVERLAY */}
            {/*<div className="absolute inset-y-0 right-0 w-full bg-black/85 text-white p-6 flex flex-col justify-center transform translate-x-full group-hover:translate-x-0 transition-transform duration-500">*/}

            {/*    <h3 className="text-xl font-bold mb-4">*/}
            {/*        {product.title}*/}
            {/*    </h3>*/}

            {/*    <ul className="space-y-2 text-sm leading-relaxed">*/}

            {/*        {product.features?.map((item, index) => (*/}
            {/*            <li key={index}>{item.feature}</li>*/}
            {/*        ))}*/}

            {/*    </ul>*/}

            {/*</div>*/}
            <div className="
absolute inset-y-0 right-0 w-full
bg-black/85 text-white
px-6 pt-14
flex flex-col
items-center
text-center
transform translate-x-full
group-hover:translate-x-0
transition-transform duration-500
">

                <h3 className="text-xl font-bold mb-4 break-words max-w-[220px]">
                    {product.title}
                </h3>

                <ul className="space-y-2 text-sm leading-relaxed max-w-[220px]">

                    {product.features?.map((item, index) => (
                        <li key={index} className="break-words">
                            {item.feature}
                        </li>
                    ))}

                </ul>

            </div>
        </div>
    )
}
