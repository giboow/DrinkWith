set :stages,        %w(production staging)
set :default_stage, "production"
set :stage_dir,     "app/config"
require 'capistrano/ext/multistage'


set :application, "drink-with"
set :domain,      "#{application}.me"
set :deploy_to,   "/var/www/#{domain}"
set :app_path,    "app"


set :user, "jenkins"
set :use_sudo, false
set :group_writable, true
set :writable_dirs,     ["app/cache", "app/logs"]
set :webserver_user,    "www-data"
set :permission_method, :chown
set :use_set_permissions, true


set :repository,  "git@github.com:giboow/DrinkWith.git"
set :scm,         :git


set :model_manager, "doctrine"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Symfony2 migrations will run

set :shared_children,     ["logs", "web/uploads", "vendor"]

set  :keep_releases,  3
set :dump_assetic_assets, true
set :use_composer, true
set :update_vendors, true

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL

# Run migrations before warming the cache
#before "symfony:cache:warmup", "symfony:doctrine:migrations:migrate"