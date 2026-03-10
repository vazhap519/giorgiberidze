// import { useState } from "react"
// import axios from "axios"
// import toast from "react-hot-toast"
//
// import ContactForService from "@/Components/Contact/ContactForService"
// import EmailForm from "@/Components/Contact/EmailForm"
//
// export default function Contact({ contact = {} }) {
//
//     const [loading, setLoading] = useState(false)
//
//     const [form, setForm] = useState({
//         name: "",
//         email: "",
//         phone: "",
//         message: ""
//     })
//
//     const [serviceForm, setServiceForm] = useState({
//         service: "",
//         name: "",
//         address: "",
//         phone: "",
//         message: ""
//     })
//
//
//     /* CONTACT FORM */
//
//     const sendContact = async (e) => {
//
//         e.preventDefault()
//
//         const toastId = toast.loading("მესიჯი იგზავნება...")
//
//         try {
//
//             setLoading(true)
//
//             await axios.post("/contact-send", form)
//
//             toast.success("შეტყობინება წარმატებით გაიგზავნა ✔", {
//                 id: toastId
//             })
//
//             setForm({
//                 name: "",
//                 email: "",
//                 phone: "",
//                 message: ""
//             })
//
//         } catch {
//
//             toast.error("მესიჯის გაგზავნა ვერ მოხერხდა ❌", {
//                 id: toastId
//             })
//
//         } finally {
//
//             setLoading(false)
//
//         }
//
//     }
//
//
//     /* SERVICE REQUEST */
//
//     const sendService = async (e) => {
//
//         e.preventDefault()
//
//         const toastId = toast.loading("მოთხოვნა იგზავნება...")
//
//         try {
//
//             setLoading(true)
//
//             await axios.post("/service-request-send", serviceForm)
//
//             toast.success("სერვისის მოთხოვნა წარმატებით გაიგზავნა ✔", {
//                 id: toastId
//             })
//
//             setServiceForm({
//                 service: "",
//                 name: "",
//                 address: "",
//                 phone: "",
//                 message: ""
//             })
//
//         } catch {
//
//             toast.error("მოთხოვნის გაგზავნა ვერ მოხერხდა ❌", {
//                 id: toastId
//             })
//
//         } finally {
//
//             setLoading(false)
//
//         }
//
//     }
//
//
//     const backgroundStyle = contact?.section_gradient_from
//         ? `linear-gradient(135deg, ${contact.section_gradient_from}, ${contact.section_gradient_to})`
//         : (contact?.section_bg ?? "#f8fafc")
//
//
//     return (
//
//         <section
//             style={{
//                 background: backgroundStyle,
//                 paddingTop: `${contact?.section_padding ?? 96}px`,
//                 paddingBottom: `${contact?.section_padding ?? 96}px`,
//                 opacity: Number(contact?.section_opacity ?? 1)
//             }}
//             className="relative w-full"
//         >
//
//             <div className="max-w-7xl mx-auto px-6">
//
//                 <div className="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
//
//                     <EmailForm
//                         form={form}
//                         setForm={setForm}
//                         sendContact={sendContact}
//                         loading={loading}
//                         contact={contact}
//                     />
//
//                     <ContactForService
//                         serviceForm={serviceForm}
//                         setServiceForm={setServiceForm}
//                         sendService={sendService}
//                         loading={loading}
//                         contact={contact}
//                     />
//
//                 </div>
//
//             </div>
//
//         </section>
//
//     )
// }
import { useState } from "react"
import axios from "axios"
import toast from "react-hot-toast"

import ContactForService from "@/Components/Contact/ContactForService"
import EmailForm from "@/Components/Contact/EmailForm"

export default function Contact({ contact = {} }) {

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

        } catch {

            toast.error("მესიჯის გაგზავნა ვერ მოხერხდა ❌", {
                id: toastId
            })

        } finally {

            setLoading(false)

        }

    }


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

        } catch {

            toast.error("მოთხოვნის გაგზავნა ვერ მოხერხდა ❌", {
                id: toastId
            })

        } finally {

            setLoading(false)

        }

    }

    const backgroundStyle =
        contact?.section_gradient_from && contact?.section_gradient_to
            ? `linear-gradient(135deg, ${contact.section_gradient_from}, ${contact.section_gradient_to})`
            : (contact?.section_bg ?? "#f8fafc")

    return (

        <section
            style={{
                background: backgroundStyle,
                paddingTop: `${contact?.section_padding ?? 96}px`,
                paddingBottom: `${contact?.section_padding ?? 96}px`,
                opacity: (contact?.section_opacity ?? 100) / 100
            }}
            className="relative w-full"
        >

            <div className="max-w-7xl mx-auto px-6">

                <div className="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">

                    <EmailForm
                        form={form}
                        setForm={setForm}
                        sendContact={sendContact}
                        loading={loading}
                        contact={contact}
                    />

                    <ContactForService
                        serviceForm={serviceForm}
                        setServiceForm={setServiceForm}
                        sendService={sendService}
                        loading={loading}
                        contact={contact}
                    />

                </div>

            </div>

        </section>

    )
}
