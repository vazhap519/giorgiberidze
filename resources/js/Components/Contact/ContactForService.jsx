export default function ContactForService({
                                              serviceForm,
                                              setServiceForm,
                                              sendService,
                                              loading,
                                              siteSettings,
                                              contact
                                          }) {

    return (

        <div className="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition">

            <h3 className="text-xl font-semibold mb-6">
                {siteSettings?.contact_service_title}
            </h3>

            <form onSubmit={sendService} className="space-y-4">

                <select
                    value={serviceForm.service}
                    onChange={(e)=>setServiceForm({...serviceForm,service:e.target.value})}
                    className="w-full border border-gray-200 rounded-xl px-4 py-3"
                    required
                >

                    <option value="">აირჩიეთ სერვისი</option>

                    {contact?.service_options?.map((service, index) => (
                        <option key={index} value={service.title}>
                            {service.title}
                        </option>
                    ))}

                </select>

                <input
                    type="text"
                    placeholder="სახელი გვარი"
                    value={serviceForm.name}
                    onChange={(e)=>setServiceForm({...serviceForm,name:e.target.value})}
                    className="w-full border border-gray-200 rounded-xl px-4 py-3"
                    required
                />

                <input
                    type="text"
                    placeholder="მისამართი"
                    value={serviceForm.address}
                    onChange={(e)=>setServiceForm({...serviceForm,address:e.target.value})}
                    className="w-full border border-gray-200 rounded-xl px-4 py-3"
                />

                <input
                    type="tel"
                    placeholder="საკონტაქტო ტელეფონი"
                    value={serviceForm.phone}
                    onChange={(e) => {
                        const value = e.target.value.replace(/\D/g, "").slice(0, 9)
                        setServiceForm({ ...serviceForm, phone: value })
                    }}
                    inputMode="numeric"
                    pattern="5[0-9]{8}"
                    maxLength={9}
                    className="w-full border border-gray-200 rounded-xl px-4 py-3"
                    required
                />
                <textarea
                    rows="4"
                    placeholder="დამატებითი ინფორმაცია"
                    value={serviceForm.message}
                    onChange={(e)=>setServiceForm({...serviceForm,message:e.target.value})}
                    className="w-full border border-gray-200 rounded-xl px-4 py-3"
                />

                <button
                    type="submit"
                    disabled={loading}
                    className="w-full py-3 rounded-xl bg-blue-600 text-white"
                >
                    {loading ? "იგზავნება..." : siteSettings?.contact_service_button}
                </button>

            </form>

        </div>

    )
}
