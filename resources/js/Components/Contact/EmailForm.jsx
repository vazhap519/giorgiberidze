
export default function EmailForm({
                                      form,
                                      setForm,
                                      sendContact,
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
                opacity: (contact?.card_opacity ?? 100) / 100
            }}
            className={`border p-8 cursor-pointer h-[580px] ${shadowMap[contact?.card_shadow] ?? "shadow-md"}`}
        >

            <h3
                style={{
                    color: contact?.title_color ?? "#111827",
                    fontSize: contact?.title_size ?? 20,
                    fontWeight: contact?.title_weight ?? 600
                }}
                className="mb-6"
            >
                {contact?.contact_form_title ?? "მოგვწერეთ"}
            </h3>

            <form onSubmit={sendContact} className="space-y-4">

                <input
                    type="text"
                    placeholder={contact?.name_placeholder}
                    value={form.name}
                    onChange={(e)=>setForm({...form,name:e.target.value})}
                    style={inputStyle}
                    className="w-full px-4 py-3 border focus:outline-none"
                />

                <input
                    type="email"
                    placeholder={contact?.email_placeholder}
                    value={form.email}
                    onChange={(e)=>setForm({...form,email:e.target.value})}
                    style={inputStyle}
                    className="w-full px-4 py-3 border focus:outline-none"
                />

                <input
                    type="tel"
                    placeholder={contact?.phone_placeholder}
                    value={form.phone}
                    onChange={(e)=>{
                        const value=e.target.value.replace(/\D/g,"").slice(0,9)
                        setForm({...form,phone:value})
                    }}
                    style={inputStyle}
                    className="w-full px-4 py-3 border focus:outline-none"
                />

                <textarea

                    placeholder={contact?.message_placeholder}
                    value={form.message}
                    onChange={(e)=>setForm({...form,message:e.target.value})}
                    style={inputStyle}
                    className="w-full px-4 py-3 border focus:outline-none h-[185px]"
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
                    className={`w-full py-3 ${shadowMap[contact?.button_shadow] ?? "shadow-md"}`}
                >
                    {loading ? "იგზავნება..." : contact?.contact_form_button}
                </button>

            </form>

        </div>

    )
}
