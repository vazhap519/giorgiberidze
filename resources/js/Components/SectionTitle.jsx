export default function SectionTitle({ title }) {
    return (
        <div className="mb-14 text-center lg:text-left">

            <h2 className="
                text-4xl
                md:text-5xl
                lg:text-6xl
                font-extrabold
                text-gray-900
                tracking-tight
                inline-block
            ">
                {title}

                <span className="
                    block
                    w-full
                    h-[3px]
                    bg-blue-600
                       mt-6
                    rounded
                " />
            </h2>

        </div>
    )
}
