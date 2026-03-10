import { Head, usePage } from "@inertiajs/react";

export default function SeoHead({ seo = {}, pageTitle = "" }) {

    const { siteSettings } = usePage().props;

    const siteName = siteSettings?.site_name || "Website";

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    */

    const title =
        seo?.meta_title
            ? `${seo.meta_title} | ${siteName}`
            : pageTitle
                ? `${pageTitle} | ${siteName}`
                : siteName;

    /*
    |--------------------------------------------------------------------------
    | Description
    |--------------------------------------------------------------------------
    */

    const description = seo?.meta_description || "";

    /*
    |--------------------------------------------------------------------------
    | Canonical
    |--------------------------------------------------------------------------
    */

    const canonical =
        seo?.canonical_url ??
        (typeof window !== "undefined"
            ? window.location.origin + window.location.pathname
            : "");

    /*
    |--------------------------------------------------------------------------
    | Image
    |--------------------------------------------------------------------------
    */

    const image =
        seo?.og_image_url ??
        siteSettings?.logo_url ??
        "";

    /*
    |--------------------------------------------------------------------------
    | Robots
    |--------------------------------------------------------------------------
    */

    const robots =
        seo?.robots ??
        (seo?.indexable === false
            ? "noindex,nofollow"
            : "index,follow");

    /*
    |--------------------------------------------------------------------------
    | Twitter Card
    |--------------------------------------------------------------------------
    */

    const twitterCard = seo?.twitter_card || "summary_large_image";

    return (
        <Head>

            {/* Title */}
            <title>{title}</title>

            {/* Meta Description */}
            {description && (
                <meta name="description" content={description} />
            )}

            {/* Robots */}
            <meta name="robots" content={robots} />

            {/* Canonical */}
            {canonical && (
                <link rel="canonical" href={canonical} />
            )}

            {/* Open Graph */}

            <meta property="og:title" content={seo?.og_title || title} />
            <meta property="og:description" content={seo?.og_description || description} />
            <meta property="og:image" content={image} />
            <meta property="og:type" content="website" />
            <meta property="og:url" content={canonical} />
            <meta property="og:site_name" content={siteName} />

            {/* Twitter */}

            <meta name="twitter:card" content={twitterCard} />
            <meta name="twitter:title" content={seo?.twitter_title || title} />
            <meta name="twitter:description" content={seo?.twitter_description || description} />
            <meta name="twitter:image" content={image} />

            {/* Optional schema (future use) */}

            {seo?.schema_type === "website" && (
                <script
                    type="application/ld+json"
                    dangerouslySetInnerHTML={{
                        __html: JSON.stringify({
                            "@context": "https://schema.org",
                            "@type": "WebSite",
                            "name": siteName,
                            "url": canonical,
                        }),
                    }}
                />
            )}

        </Head>
    );
}
