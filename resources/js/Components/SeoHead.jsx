import { Head, usePage } from '@inertiajs/react'

export default function SeoHead({ seo, pageTitle = '' }) {

    const { siteSettings } = usePage().props

    seo = seo ?? {}

    const siteName = siteSettings?.site_name || 'Website'

    const title = seo?.meta_title
        ? `${seo.meta_title} | ${siteName}`
        : pageTitle
            ? `${pageTitle} | ${siteName}`
            : siteName

    const description = seo?.meta_description || ''

    const canonical =
        seo?.canonical_url ||
        (typeof window !== "undefined" ? window.location.href : '')

    const image = seo?.og_image_url || siteSettings?.logo_url || ''

    const robots = seo?.indexable === false
        ? 'noindex,nofollow'
        : 'index,follow'

    return (
        <Head>

            <title>{title}</title>

            {description && (
                <meta name="description" content={description} />
            )}

            <meta name="robots" content={robots} />

            {canonical && (
                <link rel="canonical" href={canonical} />
            )}

            <meta property="og:title" content={seo?.og_title || title} />
            <meta property="og:description" content={seo?.og_description || description} />
            <meta property="og:image" content={image} />
            <meta property="og:type" content="website" />
            <meta property="og:url" content={canonical} />
            <meta property="og:site_name" content={siteName} />

            <meta name="twitter:card" content="summary_large_image" />
            <meta name="twitter:title" content={seo?.twitter_title || title} />
            <meta name="twitter:description" content={seo?.twitter_description || description} />
            <meta name="twitter:image" content={image} />
            <meta name="twitter:url" content={canonical} />

        </Head>
    )
}
