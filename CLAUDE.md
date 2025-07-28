# Claude Code Configuration

This is the configuration file for Claude Code, an AI-powered coding assistant.

## Project Overview

This is the documentation website for Elastica, a PHP Elasticsearch client. The site is built using Octopress (Jekyll-based static site generator) and contains:

- Documentation pages and tutorials
- API documentation
- Blog posts about releases and updates
- Examples and getting started guides

## Project Structure

- `source/` - Main content directory with Markdown files
- `_posts/` - Blog posts about releases
- `api/` - Generated API documentation
- `sass/` - Stylesheets
- `plugins/` - Octopress plugins
- `_config.yml` - Jekyll configuration
- `Rakefile` - Build tasks

## Development Commands

```bash
# Install dependencies
bundle install

# Generate and serve the site locally
bundle exec rake generate
bundle exec rake preview

# Deploy the site
bundle exec rake deploy
```

## Key Files and Directories

- `source/index.markdown` - Homepage
- `source/getting-started/` - Getting started documentation
- `source/examples/` - Code examples
- `source/_posts/` - Release announcements
- `api/` - API documentation (generated)

## Build Process

The site uses Jekyll/Octopress to generate static HTML from Markdown files. The build process:

1. Processes Markdown files in `source/`
2. Applies layouts from `source/_layouts/`
3. Compiles Sass stylesheets
4. Generates final HTML in `public/` or `_deploy/`

## Notes

- This is a documentation site, not the main Elastica PHP library
- The actual Elastica library is at https://github.com/ruflin/Elastica
- API docs are generated separately and included in the `api/` directory