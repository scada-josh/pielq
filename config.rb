###
# Blog settings
###

# Time.zone = "UTC"
Time.zone = "Bangkok"

activate :blog do |blog|
  # This will add a prefix to all links, template references and source paths
  blog.prefix = "/src/desktop/blogs/"

  blog.permalink = "{category}/{year}/{month}/{day}/{title}.html"
  # Matcher for blog source files
  blog.sources = "{category}/{year}-{month}-{day}-{title}.html"
end


###
# Compass
###

# Change Compass configuration
# compass_config do |config|
#   config.output_style = :compact
# end

###
# Page options, layouts, aliases and proxies
###

# Per-page layout changes:
#
# With no layout
# page "/path/to/file.html", :layout => false
#
# With alternative layout
# page "/path/to/file.html", :layout => :otherlayout
#
# A path which all have the same layout
# with_layout :admin do
#   page "/admin/*"
# end

# Proxy pages (https://middlemanapp.com/advanced/dynamic_pages/)
# proxy "/this-page-has-no-template.html", "/template-file.html", :locals => {
#  :which_fake_page => "Rendering a fake page with a local variable" }

###
# Helpers
###

# Automatic image dimensions on image_tag helper
# activate :automatic_image_sizes

# Reload the browser automatically whenever files change
 configure :development do
#   activate :livereload
    activate :php
    activate :bower
 end

# Methods defined in the helpers block are available in templates
# helpers do
#   def some_helper
#     "Helping"
#   end
# end

set :phase_environment, 'Development' # Development, Test, Production 
set :css_dir, 'stylesheets'
set :js_dir, 'javascripts'
set :images_dir, 'images'
set :helper_dir, 'helper'


set :partials_desktop, 'src/desktop'
set :partials_images, '../images'

set :blog_dir, 'src/desktop/blogs/'


# Build-specific configuration
configure :build do

  activate :php
  
  # For example, change the Compass output style for deployment
  # activate :minify_css

  # Minify Javascript on build
  # activate :minify_javascript

  # Enable cache buster
  # activate :asset_hash

  # Use relative URLs
  activate :relative_assets

  # Or use a different image path
  # set :http_prefix, "/Content/images/"

  # Any files you want to ignore:
  ignore '/javascripts/javascript-home/*'
  ignore '/javascripts/javascript-desktop-ldms-login/*'

  ignore '/stylesheets/stylesheet-home/*'
  ignore '/stylesheets/stylesheet-desktop-ldms-Login/*'

  ignore '/helper/*'  

  ignore '/javascripts/javascript-home/*'

  ignore '/src/prototypes/ldms/fleet-monitoring/samples/*'
  ignore '/src/prototypes/ldms/fleet-monitoring/WebService1.php'
  ignore '/src/prototypes/ldms/fleet-monitoring/WebService2.php'
  ignore '/src/prototypes/ldms/fleet-monitoring/login.php'
  ignore '/src/prototypes/ldms/fleet-monitoring/login_form.php'
  ignore '/src/prototypes/ldms/fleet-monitoring/nusoap-0.9.5.zip'
  ignore '/src/prototypes/ldms/fleet-monitoring/test.php'
  ignore '/src/prototypes/ldms/fleet-monitoring/test1.php'
  ignore '/src/prototypes/ldms/fleet-monitoring/testcode.php'
  ignore '/src/prototypes/ldms/fleet-monitoring/code.php'
  ignore '/src/prototypes/ldms/fleet-monitoring/bootstrapmap.css'
  ignore '/src/prototypes/ldms/fleet-monitoring/bootstrapmap.js'
  ignore '/src/prototypes/ldms/fleet-monitoring/getWebStation.php'
  ignore '/src/prototypes/ldms/fleet-monitoring/composer.json'
  ignore '/src/prototypes/ldms/fleet-monitoring/composer.lock'
  ignore '/src/prototypes/ldms/fleet-monitoring/composer.phar'

end


# config.rb
# Add bower's directory to sprockets asset path
after_configuration do
  #@bower_config = JSON.parse(IO.read("#{root}.bowerrc"))
  #sprockets.append_path File.join "#{root}", @bower_config["directory"]

  sprockets.append_path File.join "#{root}", "bower_components"
  sprockets.append_path File.join "#{root}", "source"
  #sprockets.import_asset 'jquery'
end
