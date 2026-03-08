// import { usePage } from "@inertiajs/react"
// import { useState } from "react"
// import axios from "axios"
// import toast from "react-hot-toast"

// import ContactForService from "@/Components/Contact/ContactForService.jsx"
// import EmailForm from "@/Components/Contact/EmailForm.jsx"
// import LeftContactInfo from "@/Components/Contact/LeftContactInfo.jsx"

// export default function Contact() {

//     const { siteSettings, contact } = usePage().props

//     const [loading, setLoading] = useState(false)

//     const [form, setForm] = useState({
//         name: "",
//         email: "",
//         phone: "",
//         message: ""
//     })

//     const [serviceForm, setServiceForm] = useState({
//         service: "",
//         name: "",
//         address: "",
//         phone: "",
//         message: ""
//     })


//     /* CONTACT FORM */

//     const sendContact = async (e) => {

//         e.preventDefault()

//         const toastId = toast.loading("მესიჯი იგზავნება...")

//         try {

//             setLoading(true)

//             await axios.post("/contact-send", form)

//             toast.success("შეტყობინება წარმატებით გაიგზავნა ✔", {
//                 id: toastId
//             })

//             setForm({
//                 name: "",
//                 email: "",
//                 phone: "",
//                 message: ""
//             })

//         } catch (error) {

//             toast.error("მესიჯის გაგზავნა ვერ მოხერხდა ❌", {
//                 id: toastId
//             })

//         } finally {

//             setLoading(false)

//         }

//     }


//     /* SERVICE REQUEST */

//     const sendService = async (e) => {

//         e.preventDefault()

//         const toastId = toast.loading("მოთხოვნა იგზავნება...")

//         try {

//             setLoading(true)

//             await axios.post("/service-request-send", serviceForm)

//             toast.success("სერვისის მოთხოვნა წარმატებით გაიგზავნა ✔", {
//                 id: toastId
//             })

//             setServiceForm({
//                 service: "",
//                 name: "",
//                 address: "",
//                 phone: "",
//                 message: ""
//             })

//         } catch (error) {

//             toast.error("მოთხოვნის გაგზავნა ვერ მოხერხდა ❌", {
//                 id: toastId
//             })

//         } finally {

//             setLoading(false)

//         }

//     }


//     return (

//         <section className="w-full bg-slate-50 py-20">

//             <div className="max-w-[1600px] mx-auto px-6 lg:px-20">

//                 <div className="grid grid-cols-1 lg:grid-cols-3 gap-16 items-start">

//                     {/* LEFT CONTACT INFO */}

//                     <LeftContactInfo
//                         siteSettings={siteSettings}
//                         contact={contact}
//                     />
//                     {/* EMAIL FORM */}

//                     <EmailForm
//                         form={form}
//                         setForm={setForm}
//                         sendContact={sendContact}
//                         loading={loading}
//                         siteSettings={siteSettings}
//                     />

//                     {/* SERVICE REQUEST */}

//                     <ContactForService
//                         serviceForm={serviceForm}
//                         setServiceForm={setServiceForm}
//                         sendService={sendService}
//                         loading={loading}
//                         siteSettings={siteSettings}
//                         contact={contact}
//                     />

//                 </div>

//             </div>

//         </section>
//     )
// }
import { usePage } from "@inertiajs/react"
import { useState } from "react"
import axios from "axios"
import toast from "react-hot-toast"

import ContactForService from "@/Components/Contact/ContactForService.jsx"
import EmailForm from "@/Components/Contact/EmailForm.jsx"
import LeftContactInfo from "@/Components/Contact/LeftContactInfo.jsx"

export default function Contact() {

    const { siteSettings, contact } = usePage().props

    const [loading, setLoading] = useState(false)

    const [form, setForm] = useState({
        name: "",
        email: "",
        phone: "",
        message: ""
    })

    const [serviceForm, setServiceForm] = useState({
        service: "",
        name: "",
        address: "",
        phone: "",
        message: ""
    })


    /* CONTACT FORM */

    const sendContact = async (e) => {

        e.preventDefault()

        const toastId = toast.loading("მესიჯი იგზავნება...")

        try {

            setLoading(true)

            await axios.post("/contact-send", form)

            toast.success("შეტყობინება წარმატებით გაიგზავნა ✔", {
                id: toastId
            })

            setForm({
                name: "",
                email: "",
                phone: "",
                message: ""
            })

        } catch (error) {

            toast.error("მესიჯის გაგზავნა ვერ მოხერხდა ❌", {
                id: toastId
            })

        } finally {

            setLoading(false)

        }

    }


    /* SERVICE REQUEST */

    const sendService = async (e) => {

        e.preventDefault()

        const toastId = toast.loading("მოთხოვნა იგზავნება...")

        try {

            setLoading(true)

            await axios.post("/service-request-send", serviceForm)

            toast.success("სერვისის მოთხოვნა წარმატებით გაიგზავნა ✔", {
                id: toastId
            })

            setServiceForm({
                service: "",
                name: "",
                address: "",
                phone: "",
                message: ""
            })

        } catch (error) {

            toast.error("მოთხოვნის გაგზავნა ვერ მოხერხდა ❌", {
                id: toastId
            })

        } finally {

            setLoading(false)

        }

    }


    return (

        <section className="
            relative
            w-full
            py-24
            bg-gradient-to-b
            from-slate-50
            to-white
        ">

            {/* decorative background */}

            <div className="
                absolute
                top-0
                left-0
                w-full
                h-full
                opacity-20
                pointer-events-none
                bg-[radial-gradient(circle_at_30%_20%,rgba(37,99,235,0.25),transparent_40%),radial-gradient(circle_at_80%_60%,rgba(37,99,235,0.2),transparent_45%)]
            " />

            <div className="relative max-w-7xl mx-auto px-6">

                {/* GRID */}

                <div className="
                    grid
                    grid-cols-1
                    lg:grid-cols-3
                    gap-10
                    items-start
                ">

                    {/* LEFT CONTACT INFO */}

                    <div className="lg:pr-6">

                        <LeftContactInfo
                            siteSettings={siteSettings}
                            contact={contact}
                        />

                    </div>

                    {/* EMAIL FORM */}

                    <div className="lg:scale-[1.02]">

                        <EmailForm
                            form={form}
                            setForm={setForm}
                            sendContact={sendContact}
                            loading={loading}
                            siteSettings={siteSettings}
                        />

                    </div>

                    {/* SERVICE REQUEST */}

                    <div>

                        <ContactForService
                            serviceForm={serviceForm}
                            setServiceForm={setServiceForm}
                            sendService={sendService}
                            loading={loading}
                            siteSettings={siteSettings}
                            contact={contact}
                        />

                    </div>

                </div>

            </div>

        </section>
    )
}