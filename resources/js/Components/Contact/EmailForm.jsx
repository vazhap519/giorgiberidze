// export default function EmailForm({
//                                       form,
//                                       setForm,
//                                       sendContact,
//                                       loading,
//                                       siteSettings
//                                   }) {

//     return (

//         <div className="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition">

//             <h3 className="text-xl font-semibold mb-6">
//                 {siteSettings?.contact_form_title}
//             </h3>

//             <form onSubmit={sendContact} className="space-y-4">

//                 <input
//                     type="text"
//                     placeholder="სახელი"
//                     value={form.name}
//                     onChange={(e)=>setForm({...form,name:e.target.value})}
//                     className="w-full border border-gray-200 rounded-xl px-4 py-3"
//                     required
//                 />

//                 <input
//                     type="email"
//                     placeholder="იმეილი"
//                     value={form.email}
//                     onChange={(e)=>setForm({...form,email:e.target.value})}
//                     className="w-full border border-gray-200 rounded-xl px-4 py-3"
//                     required
//                 />

//                 <input
//                     type="tel"
//                     placeholder="ტელეფონი"
//                     value={form.phone}
//                     onChange={(e) => {
//                         const value = e.target.value.replace(/\D/g, "").slice(0, 9)
//                         setForm({ ...form, phone: value })
//                     }}
//                     inputMode="numeric"
//                     pattern="5[0-9]{8}"
//                     maxLength={9}
//                     className="w-full border border-gray-200 rounded-xl px-4 py-3"
//                     required
//                 />

//                 <textarea
//                     rows="4"
//                     placeholder="ტექსტი"
//                     value={form.message}
//                     onChange={(e)=>setForm({...form,message:e.target.value})}
//                     className="w-full border border-gray-200 rounded-xl px-4 py-3"
//                     required
//                 />

//                 <button
//                     type="submit"
//                     disabled={loading}
//                     className="w-full py-3 rounded-xl bg-blue-600 text-white"
//                 >
//                     {loading ? "იგზავნება..." : siteSettings?.contact_form_button}
//                 </button>

//             </form>

//         </div>

//     )
// }
export default function EmailForm({
    form,
    setForm,
    sendContact,
    loading,
    siteSettings
}) {

    return (

        <div className="
            bg-white
            rounded-2xl
            shadow-lg
            p-8
            border border-gray-100
            hover:shadow-2xl
            transition
        ">

            <h3 className="
                text-xl
                font-semibold
                text-gray-900
                mb-6
            ">
                {siteSettings?.contact_form_title}
            </h3>

            <form onSubmit={sendContact} className="space-y-4">

                <input
                    type="text"
                    placeholder="სახელი"
                    value={form.name}
                    onChange={(e)=>setForm({...form,name:e.target.value})}
                    className="
                        w-full
                        border border-gray-200
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-blue-500
                        transition
                    "
                    required
                />

                <input
                    type="email"
                    placeholder="იმეილი"
                    value={form.email}
                    onChange={(e)=>setForm({...form,email:e.target.value})}
                    className="
                        w-full
                        border border-gray-200
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-blue-500
                        transition
                    "
                    required
                />

                <input
                    type="tel"
                    placeholder="ტელეფონი"
                    value={form.phone}
                    onChange={(e) => {
                        const value = e.target.value.replace(/\D/g, "").slice(0, 9)
                        setForm({ ...form, phone: value })
                    }}
                    inputMode="numeric"
                    pattern="5[0-9]{8}"
                    maxLength={9}
                    className="
                        w-full
                        border border-gray-200
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-blue-500
                        transition
                    "
                    required
                />

                <textarea
                    rows="4"
                    placeholder="ტექსტი"
                    value={form.message}
                    onChange={(e)=>setForm({...form,message:e.target.value})}
                    className="
                        w-full
                        border border-gray-200
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-blue-500
                        transition
                    "
                    required
                />

                <button
                    type="submit"
                    disabled={loading}
                    className="
                        w-full
                        py-3
                        rounded-xl
                        bg-gradient-to-r
                        from-blue-600
                        to-blue-500
                        text-white
                        font-medium
                        shadow
                        hover:shadow-lg
                        hover:scale-[1.02]
                        transition
                    "
                >
                    {loading ? "იგზავნება..." : siteSettings?.contact_form_button}
                </button>

            </form>

        </div>
    )
}