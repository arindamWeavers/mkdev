<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "JobPosting",
  "hiringOrganization": <?php echo $orgSchema; ?>,
  "datePosted": "<?php the_date('Y-m-d'); ?>",
  "description": <?php echo to_json_string(get_the_content(),true); ?>,
  "employmentType": "<?php echo get_field('job_type'); ?>",
  "jobLocation": {
    "@type": "Place",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Woodcliff Lake",
      "addressRegion": "NJ",
      "streetAddress": "123 Tice Boulevard",
      "postalCode": "07677",
      "addressCountry": "US"
    }
  },
  "qualifications": <?php echo to_json_string(get_the_content(),true); ?>,
  "responsibilities": <?php echo to_json_string(get_the_content(),true); ?>,
  "title": "<?php the_title(); ?>"
}
</script>