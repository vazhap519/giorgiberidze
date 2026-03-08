import { motion } from "framer-motion";

export default function AboutUs({ about }) {

  if (!about) return null;

  return (
    <section className="py-28 bg-gradient-to-b from-white to-gray-50">
      <div className="max-w-7xl mx-auto px-6">

        {/* Title */}
        <motion.div
          initial={{ opacity: 0, y: 40 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6 }}
          className="text-center mb-20"
        >
          <h2 className="text-4xl md:text-5xl font-bold text-gray-900">
            {about.title}
          </h2>

          <p className="mt-6 text-lg text-gray-600 max-w-2xl mx-auto">
            {about.description}
          </p>
        </motion.div>


        <div className="grid md:grid-cols-2 gap-16 items-center">

          {/* Image */}
          <motion.div
            initial={{ opacity: 0, x: -60 }}
            whileInView={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.7 }}
            className="relative"
          >
            <img
              src={about.image_url}
              className="rounded-3xl shadow-2xl"
            />

            <div className="absolute -bottom-8 -right-8 backdrop-blur-lg bg-white/70 border border-gray-200 shadow-xl rounded-2xl px-8 py-5">
              <p className="text-3xl font-bold text-blue-600">
                {about.experience_years}
              </p>

              <p className="text-gray-600 text-sm">
                {about.experience_label}
              </p>
            </div>
          </motion.div>


          {/* Cards */}
          <div className="grid sm:grid-cols-2 gap-6">

            {about.features?.map((item, index) => (
              <motion.div
                key={item.id}
                initial={{ opacity: 0, y: 40 }}
                whileInView={{ opacity: 1, y: 0 }}
                transition={{ delay: index * 0.15 }}
                whileHover={{ y: -6 }}
                className="
                group
                p-7
                rounded-2xl
                bg-white/70
                backdrop-blur
                border border-gray-200
                shadow-sm
                hover:shadow-xl
                transition
                "
              >

                <h4 className="font-semibold text-lg text-gray-900 mb-2 group-hover:text-blue-600 transition">
                  {item.title}
                </h4>

                <p className="text-gray-600 text-sm leading-relaxed">
                  {item.description}
                </p>

              </motion.div>
            ))}

          </div>

        </div>
      </div>
    </section>
  );
}