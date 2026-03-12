
export default function ContactForService({
                                              serviceForm,
                                              setServiceForm,
                                              sendService,
                                              loading,
                                              contact = {}
                                          }) {

    const shadowMap = {
        sm: "shadow-sm",
        md: "shadow-md",
        lg: "shadow-lg",
        xl: "shadow-xl",
        "2xl": "shadow-2xl"
    }

    const inputStyle = {
        background: contact?.input_bg ?? "#fff",
        borderColor: contact?.input_border ?? "#e5e7eb",
        borderWidth: contact?.input_border_width ?? 1,
        borderRadius: contact?.input_radius ?? 10
    }

    return (

        <div
            style={{
                background: contact?.card_bg ?? "#ffffff",
                borderColor: contact?.card_border ?? "#e5e7eb",
                borderWidth: contact?.card_border_width ?? 1,
                borderRadius: contact?.card_radius ?? 16,
                opacity:(contact?.card_opacity ?? 100)/100
            }}
            className={`border p-8 h-[580px] cursor-pointer ${shadowMap[contact?.card_shadow] ?? "shadow-md"}`}
        >

            <h3
                style={{
                    color: contact?.title_color,
                    fontSize: contact?.title_size,
                    fontWeight: contact?.title_weight
                }}
                className="mb-6"
            >
                {contact?.service_form_title}
            </h3>

            <form onSubmit={sendService} className="space-y-4">

                <select
                    value={serviceForm.service}
                    onChange={(e)=>setServiceForm({...serviceForm,service:e.target.value})}
                    style={inputStyle}
                    className="w-full px-4 py-3 border focus:outline-none"
                >

                    <option value="">
                        აირჩიეთ სერვისი
                    </option>

                    {(contact?.service_options ?? []).map((service,index)=>(
                        <option key={index} value={service.title}>
                            {service.title}
                        </option>
                    ))}

                </select>

                <input
                    type="text"
                    placeholder={contact?.name_placeholder}
                    value={serviceForm.name}
                    onChange={(e)=>setServiceForm({...serviceForm,name:e.target.value})}
                    style={inputStyle}
                    className="w-full px-4 py-3 border focus:outline-none"
                />

                <input
                    type="text"
                    placeholder={contact?.address_placeholder}
                    value={serviceForm.address}
                    onChange={(e)=>setServiceForm({...serviceForm,address:e.target.value})}
                    style={inputStyle}
                    className="w-full px-4 py-3 border focus:outline-none"
                />

                <input
                    type="tel"
                    placeholder={contact?.phone_placeholder}
                    value={serviceForm.phone}
                    onChange={(e)=>{
                        const value=e.target.value.replace(/\D/g,"").slice(0,9)
                        setServiceForm({...serviceForm,phone:value})
                    }}
                    style={inputStyle}
                    className="w-full px-4 py-3 border focus:outline-none"
                />

                <textarea
                    rows="4"
                    placeholder={contact?.message_placeholder}
                    value={serviceForm.message}
                    onChange={(e)=>setServiceForm({...serviceForm,message:e.target.value})}
                    style={inputStyle}
                    className="w-full px-4 py-3 border focus:outline-none"
                />

                <button
                    type="submit"
                    disabled={loading}
                    style={{
                        background:`linear-gradient(135deg, ${contact?.button_bg_from}, ${contact?.button_bg_to})`,
                        color:contact?.button_text_color,
                        borderRadius:contact?.button_radius,
                        opacity:(contact?.button_opacity ?? 100)/100
                    }}
                    className={`w-full py-3  ${shadowMap[contact?.button_shadow] ?? "shadow-md"}`}
                >
                    {loading ? "იგზავნება..." : contact?.service_form_button}
                </button>

            </form>

        </div>

    )
}
